<?php

namespace App\Http\Controllers;

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
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        //for validation i've use Form Request Validation
        DB::beginTransaction();
        try {
            $patient = Patient::create($request->all());
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
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        abort_if(Gate::denies('patients_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('patients.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //for validation i've use Form Request Validation
        DB::beginTransaction();
        try {
            $patient->update($request->all());
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
}
