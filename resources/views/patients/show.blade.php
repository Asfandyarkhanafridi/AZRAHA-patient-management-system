@extends('layouts.nav')
@section('title', 'Patient Show')
@section('app-content', 'app-content')

@section('main-content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Patient</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('patients.index')}}">Patients</a>
                        </li>
                        <li class="breadcrumb-item active">Patient
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            @if($patient->gender == 1)
                                <img class="img-fluid rounded mb-2" src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" height="110" width="110" alt="User avatar">
                            @else
                                <img class="img-fluid rounded mb-2" src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" height="110" width="110" alt="User avatar">
                            @endif
                            <div class="user-info text-center">
                                <h4>{{$patient->name}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-2 pt-75">
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i class="fa fa-birthday-cake"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{date('d-m-Y', strtotime($patient->date_of_birth))}}</h5>
                                <small>Birth Date</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i class="fa fa-phone"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{$patient->phone}}</h5>
                                <small>Phone</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-2 pt-75">
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i class="fa fa-phone"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{$patient->email}}</h5>
                                <small>Email</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i class="fa fa-venus"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{$patient->gender == 1 ? 'Male' : 'Female'}}</h5>
                                <small>Gender</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between my-2 pt-75">
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i class="fa fa-phone"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{$patient->city}}</h5>
                                <small>City</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i class="fa fa-phone"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{$patient->country}}</h5>
                                <small>Country</small>
                            </div>
                        </div>
                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Contact Information:</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Relative Name:</span>
                                <span>{{$patient->contactInformation->relative_name}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Relation:</span>
                                <span>{{$patient->contactInformation->relation}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Blood Group:</span>
                                <span>{{$patient->contactInformation->blood_group}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Relative Phone:</span>
                                <span>{{$patient->contactInformation->relative_phone}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Relative Email:</span>
                                <span>{{$patient->contactInformation->relative_email}}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center pt-2">
                            @can('patients_update')
                                <a href="{{route('patients.edit',$patient->id)}}" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                    Edit
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-0 order-md-1">
            <div class="card">
                <h4 class="fw-bolder border-bottom pb-50 mb-1 ms-2 mt-2">Details</h4>
                <div class="info-container ms-4">
                    <ul class="list-unstyled">
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Medical History:</span>
                            @foreach($patient->medicalHistories as $item)
                            <hr>
                                <span class="fw-bolder me-25 ms-2">Visit #:</span>
                                <span>{{$item->visit_number}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Doctor:</span>
                                <span>{{$item->doctor->name}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Remarks:</span>
                                <span>{{$item->remarks}}</span>
                            @endforeach
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Current Medications:</span>
                            @foreach($patient->currentMedications as $item)
                            <hr>
                                <span class="fw-bolder me-25 ms-2">Medication Name:</span>
                                <span>{{$item->medication_name}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Dosage:</span>
                                <span>{{$item->dosage}}</span>
                                <br>
                                <span class="fw-bolder me-25 ms-2">Frequency:</span>
                                <span>{{$item->frequency}}</span>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
