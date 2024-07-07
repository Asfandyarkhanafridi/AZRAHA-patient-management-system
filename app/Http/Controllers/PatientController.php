<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\CurrentMedication;
use App\Models\Doctor;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('patients_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $filter = array();
        $filter['patient_id'] = $request->input('patient_id');

        $patients = Patient::orderByDesc('created_at');

        //Filter by Patient Name
        if ( isset($_GET['filterPatientDetail'])) {
            if (!blank($filter['patient_id'])){
                $patients = Patient::where('id',$filter['patient_id']);
            }
        }
        $patients = $patients->paginate(15);
        return view('patients.index',compact('patients','filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('patients_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $doctors = Doctor::all();
        return view('patients.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        //for validation i've use Form Request Validation
        DB::beginTransaction();
        try {
            $patient = Patient::create($request->only('name','date_of_birth','gender','city','country','phone','email'));
            $request['patient_id']=$patient->id;

            //saving contact Information
            $contactInformation = ContactInformation::create($request->only('patient_id','relative_name','relation','blood_group','relative_phone','relative_email'));

            //saving medical history
            $medicalHistories = [];
            foreach ($request->input('visit_number') as $index => $visitNumber) {
                $medicalHistories[] = [
                    'patient_id' => $patient->id,
                    'visit_number' => $visitNumber,
                    'doctor_id' => $request->input('doctor_id')[$index],
                    'remarks' => $request->input('remarks')[$index],
                ];
            }
            MedicalHistory::insert($medicalHistories);

            //saving current medication
            $medications = [];
            foreach ($request->input('medication_name') as $index => $medicationName) {
                $medications[] = [
                    'patient_id' => $patient->id,
                    'medication_name' => $medicationName,
                    'dosage' => $request->input('dosage')[$index],
                    'frequency' => $request->input('frequency')[$index],
                ];
            }
            CurrentMedication::insert($medications);

            DB::commit();
            $request->session()->flash('message', 'Record added successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('errorMessage', 'An error occurred while adding Record!');
        }
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        abort_if(Gate::denies('patients_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $patient = Patient::with(['contactInformation','medicalHistories','currentMedications','medicalHistories.doctor'])->where('id',$patient->id)->get()->first();
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        abort_if(Gate::denies('patients_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $doctors = Doctor::all();
        $patient = Patient::with(['contactInformation','medicalHistories','currentMedications','medicalHistories.doctor'])->where('id',$patient->id)->get()->first();
        return view('patients.edit',compact('patient','doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //for validation i've use Form Request Validation
        DB::beginTransaction();
        try {
            $patient = Patient::create($request->only('name','date_of_birth','gender','city','country','phone','email'));
            $request['patient_id']=$patient->id;

            //saving contact Information
            $contactInformation = ContactInformation::create($request->only('patient_id','relative_name','relation','blood_group','relative_phone','relative_email'));

            //saving medical history
            $medicalHistories = [];
            foreach ($request->input('visit_number') as $index => $visitNumber) {
                $medicalHistories[] = [
                    'patient_id' => $patient->id,
                    'visit_number' => $visitNumber,
                    'doctor_id' => $request->input('doctor_id')[$index],
                    'remarks' => $request->input('remarks')[$index],
                ];
            }
            MedicalHistory::insert($medicalHistories);

            //saving current medication
            $medications = [];
            foreach ($request->input('medication_name') as $index => $medicationName) {
                $medications[] = [
                    'patient_id' => $patient->id,
                    'medication_name' => $medicationName,
                    'dosage' => $request->input('dosage')[$index],
                    'frequency' => $request->input('frequency')[$index],
                ];
            }
            CurrentMedication::insert($medications);

            DB::commit();
            $request->session()->flash('message', 'Record updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('errorMessage', 'An error occurred while updating Record!');
        }
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient , Request $request)
    {
        abort_if(Gate::denies('patients_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {;
            $patient->delete();
            DB::commit();
            $request->session()->flash('message', 'Record deleted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('errorMessage', 'An error occurred while deleting record!');
        }
        return redirect()->route('patients.index');
    }

    public function destroyMedicalHistories(Request $request)
    {
        abort_if(Gate::denies('patients_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {;
            DB::commit();
                $medicalHistory = MedicalHistory::where('id', $request->medicalHistoryID)->first();
            if ($medicalHistory) {
                $medicalHistory->delete();
                $request->session()->flash('message', 'Record deleted successfully!');
                return response()->json(['success' => true]);
            } else {
                $request->session()->flash('errorMessage', 'An error occurred while deleting record!!');
                return response()->json(['success' => false, 'message' => 'Medical history not found'], 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('errorMessage', 'An error occurred while deleting record!');
            return response()->json(['success' => false, 'message' => 'Medical history not found'], 404);
        }
    }

    public function destroyCurrentMedications(Request $request)
    {
        abort_if(Gate::denies('patients_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {;
            $currentMedication = CurrentMedication::where('id', $request->currentMedicationID)->first();
            DB::commit();
            if ($currentMedication) {
                $currentMedication->delete();
                $request->session()->flash('message', 'Record deleted successfully!');
                return response()->json(['success' => true]);
            } else {
                $request->session()->flash('errorMessage', 'An error occurred while deleting record!!');
                return response()->json(['success' => false, 'message' => 'Current Medication not found'], 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('errorMessage', 'An error occurred while deleting record!');
            return response()->json(['success' => false, 'message' => 'Current Medication not found'], 404);
        }
    }


}
