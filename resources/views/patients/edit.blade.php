@extends('layouts.nav')
@section('title', 'Patient Edit')
@section('app-content', 'app-content')

@section('main-content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Edit Patient</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('patients.index')}}">Patients</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Patient
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        @include('partials.message')
        <form method="POST" action="{{route('patients.update',$patient->id)}}">
            @csrf
            @method('put')
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
                                    <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ $patient->name}}">
                                    @if($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">{{ __('Date Of Birth') }}</label>
                                    <input type="date" name="date_of_birth" class="form-control form-control-lg @error('date_of_birth') is-invalid @enderror" placeholder="{{ __('Date Of Birth') }}" value="{{$patient->date_of_birth}}">
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
                                            <input type="radio" name="gender" class="form-check-input @error('gender') is-invalid @enderror" value="1" {{ $patient->gender == 1 ? 'checked' : '' }} required>
                                            {{ __('Male') }}
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input @error('gender') is-invalid @enderror" value="0" {{ $patient->gender == 0 ? 'checked' : '' }} required>
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
                                    <input type="text" name="city" class="form-control form-control-lg @error('city') is-invalid @enderror" placeholder="{{ __('City') }}" value="{{$patient->city}}">
                                    @if($errors->has('city'))
                                        <div class="text-danger">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">{{ __('Country') }}</label>
                                    <input type="text" name="country" class="form-control form-control-lg @error('country') is-invalid @enderror" placeholder="{{ __('Country') }}" value="{{$patient->country}}">
                                    @if($errors->has('country'))
                                        <div class="text-danger">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="{{ __('Phone') }}" value="{{$patient->phone}}">
                                    @if($errors->has('phone'))
                                        <div class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">{{ __('Email address') }}</label>
                                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{$patient->email}}">
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
                                    <input type="text" name="relative_name" class="form-control form-control-lg @error('relative_name') is-invalid @enderror" placeholder="{{ __('Relative Name') }}" value="{{$patient->contactInformation->relative_name}}">
                                    @if($errors->has('relative_name'))
                                        <div class="text-danger">
                                            {{ $errors->first('relative_name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label required">{{ __('Relation') }}</label>
                                    <input type="text" name="relation" class="form-control form-control-lg @error('relation') is-invalid @enderror" placeholder="{{ __('Relation') }}" value="{{$patient->contactInformation->relation}}">
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
                                        <option value="A+" @if($patient->contactInformation->blood_group == 'A+') selected @endif>
                                            A+
                                        </option>
                                        <option value="A-" @if($patient->contactInformation->blood_group == 'A-') selected @endif>
                                            A-
                                        </option>
                                        <option value="B+" @if($patient->contactInformation->blood_group == 'B+') selected @endif>
                                            B+
                                        </option>
                                        <option value="B-" @if($patient->contactInformation->blood_group == 'B-') selected @endif>
                                            B-
                                        </option>
                                        <option value="AB+" @if($patient->contactInformation->blood_group == 'AB+') selected @endif>
                                            AB+
                                        </option>
                                        <option value="AB-" @if($patient->contactInformation->blood_group == 'AB-') selected @endif>
                                            AB-
                                        </option>
                                        <option value="O+" @if($patient->contactInformation->blood_group == 'O+') selected @endif>
                                            O+
                                        </option>
                                        <option value="O-" @if($patient->contactInformation->blood_group == 'O-') selected @endif>
                                            O-
                                        </option>
                                    </select>
                                    @if($errors->has('blood_group'))
                                        <div class="text-danger">
                                            {{ $errors->first('blood_group') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label required">{{ __('Relative Phone') }}</label>
                                    <input type="text" name="relative_phone" class="form-control form-control-lg @error('relative_phone') is-invalid @enderror" placeholder="{{ __('Relative Phone') }}" value="{{$patient->contactInformation->relative_phone}}">
                                    @if($errors->has('relative_phone'))
                                        <div class="text-danger">
                                            {{ $errors->first('relative_phone') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label required">{{ __('Relative Email address') }}</label>
                                    <input type="email" name="relative_email" class="form-control form-control-lg @error('relative_email') is-invalid @enderror" placeholder="{{ __('Relative Email') }}" value="{{$patient->contactInformation->relative_email}}">
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
                                @foreach($patient->medicalHistories as $medicalHistory)
                                    <div class="row g-2 align-items-center medical-history-row">
                                    <input type="hidden" class="medical_history_id" name="medical_history_id[]" value="{{$medicalHistory->id}}">
                                        <div class="col-md-2">
                                            <label class="form-label">{{ __('Visit#') }}</label>
                                            <input type="text" name="visit_number[]" class="form-control form-control-lg ps-2 pe-2 @error('visit_number') is-invalid @enderror" value="{{ $medicalHistory->visit_number }}">
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
                                                    <option value="{{ $doctor->id }}" @if($medicalHistory->doctor_id == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('doctor_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('doctor_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label required">{{ __('Remarks') }}</label>
                                            <textarea name="remarks[]" class="form-control form-control-lg @error('remarks') is-invalid @enderror" placeholder="{{ __('Remarks') }}">{{ $medicalHistory->remarks }}</textarea>
                                            @if($errors->has('remarks'))
                                                <div class="text-danger">
                                                    {{ $errors->first('remarks') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-2 mt-4 text-center">
                                            <button type="button" class="btn btn-outline-danger btnDelete" onclick="removeMedicalHistoryRow(this)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-1 mt-4 ms-2 text-center">
                                <button type="button" id="addMedicalHistoryBtn" class="btn btn-gradient-primary">
                                    <span class="fa fa-plus"></span>
                                </button>
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
                                @foreach($patient->currentMedications as $currentMedication)
                                    <div class="row g-2 align-items-center medication-row">
                                    <input type="hidden" class="current_medications_id" name="current_medications_id[]" value="{{ $currentMedication->id }}">
                                        <div class="col-md-2">
                                            <label class="form-label">Row#</label>
                                            <input type="text" class="form-control form-control-lg row-number" value="{{ $loop->iteration }}" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label required">Medication Name</label>
                                            <input type="text" name="medication_name[]" class="form-control form-control-lg @error('medication_name') is-invalid @enderror" placeholder="Medication Name" value="{{ $currentMedication->medication_name }}">
                                            @if($errors->has('medication_name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('medication_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label required">Dosage</label>
                                            <input type="text" name="dosage[]" class="form-control form-control-lg @error('dosage') is-invalid @enderror" placeholder="Dosage" value="{{ $currentMedication->dosage }}">
                                            @if($errors->has('dosage'))
                                                <div class="text-danger">
                                                    {{ $errors->first('dosage') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label required">Frequency</label>
                                            <input type="text" name="frequency[]" class="form-control form-control-lg @error('frequency') is-invalid @enderror" placeholder="Frequency" value="{{ $currentMedication->frequency }}">
                                            @if($errors->has('frequency'))
                                                <div class="text-danger">
                                                    {{ $errors->first('frequency') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-1 mt-3 text-center">
                                            <button type="button" class="btn btn-outline-danger btnDelete" onclick="removeMedicationRow(this)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-1 mt-4 ms-2 text-center">
                                <button type="button" id="addMedicationBtn" class="btn btn-gradient-primary">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                            <input type="hidden" id="medication_rows" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            <a href="{{ route('patients.index') }}" type="button" class="btn btn-secondary">Back</a>

        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var medicalVisitNumber = {{ count($patient->medicalHistories) }};

            $("#addMedicalHistoryBtn").click(function () {
                medicalVisitNumber += 1;
                var newRowMedicalHistory = `
                    <div class="row g-2 align-items-center medical-history-row">
                        <div class="col-md-2">
                            <input type="text" name="visit_number[]" class="form-control form-control-lg" placeholder="{{ __('Medical History Number') }}" value="${medicalVisitNumber}">
                        </div>
                        <div class="col-md-3">
                            <select name="doctor_id[]" class="form-select form-select-lg">
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
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

            window.removeMedicalHistoryRow = function (thisElem) {
                var row = $(thisElem).closest('.medical-history-row');
                var medicalHistoryID = row.find('.medical_history_id').val();
                console.log('Medical History ID:', medicalHistoryID);

                if (medicalHistoryID) {
                    $.ajax({
                        url: '{{ route("medicalHistories.destroy") }}',
                        type: 'DELETE',
                        data: {
                            medicalHistoryID: medicalHistoryID,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            row.remove();
                            medicalVisitNumber--;
                            $('#medical_history_rows').val(medicalVisitNumber);

                            $('#medical-history-rows .medical-history-row').each(function (index) {
                                $(this).find('.medical_history_id').val(index + 1);
                                $(this).find('input[name="visit_number[]"]').val(index + 1);
                            });
                            location.reload();
                        },
                        error: function (xhr) {
                            alert('An error occurred while deleting the record.');
                        }
                    });
                } else {
                    row.remove();
                    medicalVisitNumber--;
                    $('#medical_history_rows').val(medicalVisitNumber);

                    $('#medical-history-rows .medical-history-row').each(function (index) {
                        $(this).find('.medical_history_id').val(index + 1);
                        $(this).find('input[name="visit_number[]"]').val(index + 1);
                    });
                }
            }

        });
    </script>

    <script>
        $(document).ready(function () {
            var medicationRowCount = {{ count($patient->currentMedications) }};
            $("#addMedicationBtn").click(function () {
                medicationRowCount += 1;
                var newRowMedication = `
                    <div class="row g-2 align-items-center medication-row">
                        <div class="col-md-2">
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
                        <div class="col-md-1 mt-3 text-center">
                            <button type="button" class="btn btn-outline-danger btnDelete" onclick="removeMedicationRow(this)">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>`;

                $('#medication-rows').append(newRowMedication);
                $('#medication_rows').val(medicationRowCount);
                $('.row-number').each(function (index) {
                    $(this).val(index + 1);
                });
            });

            window.removeMedicationRow = function (thisElem) {
                var row = $(thisElem).closest('.medication-row');
                var currentMedicationID = row.find('.current_medications_id').val();
                console.log('Current Medication ID:', currentMedicationID);
                if (currentMedicationID) {
                    $.ajax({
                        url: '{{ route("currentMedications.destroy") }}',
                        type: 'DELETE',
                        data: {
                            currentMedicationID: currentMedicationID,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            row.remove();
                            medicationRowCount--;
                            $('#medication_rows').val(medicationRowCount);

                            $('.row-number').each(function (index) {
                                $(this).val(index + 1);
                            });

                            location.reload();
                        },
                        error: function (xhr) {
                            alert('An error occurred while deleting the record.');
                        }
                    });
                    }else{
                        row.remove();
                        medicationRowCount--;
                        $('#medication_rows').val(medicationRowCount);

                        $('.row-number').each(function (index) {
                            $(this).val(index + 1);
                        });
                    }
            }
        });
    </script>

@endsection
