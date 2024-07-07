<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('patients_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'relative_name' => 'required',
            'relation' => 'required',
            'blood_group' => 'required',
            'relative_phone' => 'required',
            'relative_email' => 'required',
            'visit_number' => 'nullable',
            'doctor_id' => 'nullable',
            'remarks' => 'nullable',
            'medication_name' => 'nullable',
            'dosage' => 'nullable',
            'frequency' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'date_of_birth.required' => 'Date of Birth is required',
            'gender.required' => 'Gender is required',
            'city.required' => 'City is required',
            'country.required' => 'Country is required',
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'relative_name.required' => 'Relative name is required',
            'relation.required' => 'Relation is required',
            'blood_group.required' => 'Blood Group is required',
            'relative_phone.required' => 'Relative Phone is required',
            'relative_email.required' => 'Relative Email is required',
            'visit_number.nullable' => 'Visit Number is required',
            'doctor_id.nullable' => 'Doctor is required',
            'remarks.nullable' => 'Remarks is required',
            'medication_name.nullable' => 'Medication name is required',
            'dosage.nullable' => 'Dosage is required',
            'frequency.nullable' => 'Frequency is required'
        ];
    }
}
