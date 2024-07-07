@extends('layouts.nav')
@section('title', 'Patient Create')
@section('app-content', 'app-content')

@section('main-content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Create Patient Detail</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('patients.index')}}">Patients</a>
                        </li>
                        <li class="breadcrumb-item active">Create Patient Detail
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    @include('partials.message')
    <form method="POST" action="{{route('patients.store')}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label required">{{ __('Patient Name') }}</label>
                                <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ old('name')}}" >
                                @if($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <label class="form-label required">{{ __('Date Of Birth') }}</label>
                                <input type="date" name="date_of_birth" class="form-control form-control-lg @error('date_of_birth') is-invalid @enderror" placeholder="{{ __('Date Of Birth') }}" value="{{ old('date_of_birth')}}" >
                                @if($errors->has('date_of_birth'))
                                    <div class="text-danger">
                                        {{ $errors->first('date_of_birth') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <label class="form-label required">{{ __('Gender') }}</label>
                                <div class="d-flex align-items-center">
                                    <label class="form-check-label me-2">
                                        <input type="radio" name="gender" class="form-check-input @error('gender') is-invalid @enderror" value="1" {{ old('gender') == 1 ? 'checked' : '' }} required>
                                        {{ __('Male') }}
                                    </label>
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input @error('gender') is-invalid @enderror" value="0" {{ old('gender') == 0 ? 'checked' : '' }} required>
                                        {{ __('Female') }}
                                    </label>
                                </div>
                                @if($errors->has('gender'))
                                    <div class="text-danger">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <label class="form-label required">{{ __('City') }}</label>
                                <input type="text" name="city" class="form-control form-control-lg @error('city') is-invalid @enderror" placeholder="{{ __('City') }}" value="{{ old('city')}}" >
                                @if($errors->has('city'))
                                    <div class="text-danger">
                                        {{ $errors->first('city') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <label class="form-label required">{{ __('Country') }}</label>
                                <input type="text" name="country" class="form-control form-control-lg @error('country') is-invalid @enderror" placeholder="{{ __('Country') }}" value="{{ old('country')}}" >
                                @if($errors->has('country'))
                                    <div class="text-danger">
                                        {{ $errors->first('country') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <label class="form-label required">{{ __('Phone') }}</label>
                                <input type="text" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="{{ __('Phone') }}" value="{{ old('phone')}}" >
                                @if($errors->has('phone'))
                                    <div class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <label class="form-label required">{{ __('Email address') }}</label>
                                <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ old('email')}}" >
                                @if($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label required">{{ __('Relative Name') }}</label>
                                <input type="text" name="relative_name" class="form-control form-control-lg @error('relative_name') is-invalid @enderror" placeholder="{{ __('Relative Name') }}" value="{{ old('relative_name')}}" >
                                @if($errors->has('relative_name'))
                                    <div class="text-danger">
                                        {{ $errors->first('relative_name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label required">{{ __('Relation') }}</label>
                                <input type="text" name="relation" class="form-control form-control-lg @error('relation') is-invalid @enderror" placeholder="{{ __('Relation') }}" value="{{ old('relation')}}" >
                                @if($errors->has('relation'))
                                    <div class="text-danger">
                                        {{ $errors->first('relation') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">{{ __('Blood Group') }}</label>
                                <select name="blood_group" id="blood_group" class="form-select form-select-lg @error('relation') is-invalid @enderror">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                @if($errors->has('blood_group'))
                                    <div class="text-danger">
                                        {{ $errors->first('blood_group') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">{{ __('Relative Phone') }}</label>
                                <input type="text" name="relative_phone" class="form-control form-control-lg @error('relative_phone') is-invalid @enderror" placeholder="{{ __('Relative Phone') }}" value="{{ old('relative_phone')}}" >
                                @if($errors->has('relative_phone'))
                                    <div class="text-danger">
                                        {{ $errors->first('relative_phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label class="form-label required">{{ __('Relative Email address') }}</label>
                                <input type="email" name="relative_email" class="form-control form-control-lg @error('relative_email') is-invalid @enderror" placeholder="{{ __('Relative Email') }}" value="{{ old('relative_email')}}" >
                                @if($errors->has('relative_email'))
                                    <div class="text-danger">
                                        {{ $errors->first('relative_email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Medical History</h4>
                    </div>
                    <div class="card-body">
                        <div id="medical-history-rows">
                            <div class="row medical-history-row">
                                <div class="col-md-1">
                                    <label class="form-label">{{ __('Visit#') }}</label>
                                    <input type="text" name="visit_number[]" class="form-control form-control-lg @error('visit_number') is-invalid @enderror" value="1" readonly>
                                    @if($errors->has('visit_number'))
                                        <div class="text-danger">
                                            {{ $errors->first('visit_number') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">{{ __('Doctor') }}</label>
                                    <select name="doctor_id[]" class="form-select form-select-lg @error('doctor_id') is-invalid @enderror">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->phone}} -> {{$doctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('doctor_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('doctor_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">{{ __('Remarks') }}</label>
                                    <textarea name="remarks[]" class="form-control form-control-lg @error('remarks') is-invalid @enderror" placeholder="{{ __('Remarks') }}"></textarea>
                                    @if($errors->has('remarks'))
                                        <div class="text-danger">
                                            {{ $errors->first('remarks') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-1 mt-4 ms-2 text-center">
                                    <button type="button" id="addMedicalHistoryBtn" class="btn btn-gradient-primary">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="medical_history_rows" value="0">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Current Medications</h4>
                    </div>
                    <div class="card-body">
                        <div id="medication-rows">
                            <div class="row g-2 align-items-center medication-row">
                                <div class="col-md-1">
                                    <label class="form-label">Row#</label>
                                    <input type="text" class="form-control form-control-lg row-number" value="1" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label required">Medication Name</label>
                                    <input type="text" name="medication_name[]" class="form-control form-control-lg @error('medication_name') is-invalid @enderror" placeholder="Medication Name" value="">
                                    @if($errors->has('medication_name'))
                                        <div class="text-danger">
                                            {{ $errors->first('medication_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label required">Dosage</label>
                                    <input type="text" name="dosage[]" class="form-control form-control-lg @error('dosage') is-invalid @enderror" placeholder="Dosage" value="">
                                    @if($errors->has('dosage'))
                                        <div class="text-danger">
                                            {{ $errors->first('dosage') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label required">Frequency</label>
                                    <input type="text" name="frequency[]" class="form-control form-control-lg @error('frequency') is-invalid @enderror" placeholder="Frequency" value="">
                                    @if($errors->has('frequency'))
                                        <div class="text-danger">
                                            {{ $errors->first('frequency') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2 mt-3 text-center">
                                    <button type="button" id="addMedicationBtn" class="btn btn-gradient-primary">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="medication_rows" value="0">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{route('patients.index')}}" type="button" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
@section('js')

    <script>
        $(document).ready(function() {
            var medicalVisitNumber = 1;  // Changed variable name for clarity

            // Add new row for medical history
            $("#addMedicalHistoryBtn").click(function() {
                medicalVisitNumber += 1;
                var newRowMedicalHistory = `
                <div class="row g-2 align-items-center medical-history-row">
                    <div class="col-md-1">
                        <input type="text" name="visit_number[]" class="form-control form-control-lg" placeholder="{{ __('Medical History Number') }}" value="${medicalVisitNumber}" readonly>
                    </div>
                    <div class="col-md-3">
                        <select name="doctor_id[]" class="form-select form-select-lg">
                            <option value="">Select Doctor</option>
                            <option value="1">Dr. Sultan</option>
                            <option value="2">Dr. Aslam</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <textarea name="remarks[]" class="form-control form-control-lg" placeholder="{{ __('Remarks') }}"></textarea>
                    </div>
                    <div class="col-md-2 mt-4 text-center">
                        <button type="button" class="btn btn-outline-danger btnDelete" onclick="removeMedicalHistoryRow(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>`;

                $('#medical-history-rows').append(newRowMedicalHistory);
                $('#medical_history_rows').val(medicalVisitNumber);
            });

            // Remove row for medical history
            window.removeMedicalHistoryRow = function(thisElem) {
                $(thisElem).closest('.medical-history-row').remove();
                medicalVisitNumber--;
                $('#medical_history_rows').val(medicalVisitNumber);

                // Recalculate visit numbers
                $('#medical-history-rows .medical-history-row').each(function(index) {
                    $(this).find('input[name="visit_number[]"]').val(index + 1);
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var medicationRowCount = 0;  // Changed variable name for clarity

            // Add new row for medication
            $("#addMedicationBtn").click(function() {
                medicationRowCount += 1;
                var newRowMedication = `
                <div class="row g-2 align-items-center medication-row">
                    <div class="col-md-1">
                        <input type="text" class="form-control form-control-lg row-number" value="${medicationRowCount}" readonly>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="medication_name[]" class="form-control form-control-lg" placeholder="Medication Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="dosage[]" class="form-control form-control-lg" placeholder="Dosage">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="frequency[]" class="form-control form-control-lg" placeholder="Frequency">
                    </div>
                    <div class="col-md-2 mt-3 text-center">
                        <button type="button" class="btn btn-outline-danger btnDelete" onclick="removeMedicationRow(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>`;

                $('#medication-rows').append(newRowMedication);
                $('#medication_rows').val(medicationRowCount);

                // Recalculate row numbers
                $('.row-number').each(function(index) {
                    $(this).val(index + 1);
                });
            });

            // Remove row for medication
            window.removeMedicationRow = function(thisElem) {
                $(thisElem).closest('.medication-row').remove();
                medicationRowCount--;
                $('#medication_rows').val(medicationRowCount);

                // Recalculate row numbers
                $('.row-number').each(function(index) {
                    $(this).val(index + 1);
                });
            }
        });
    </script>

@endsection
