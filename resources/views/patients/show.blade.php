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
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
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
                <div class="d-flex justify-content-around my-2 pt-75">
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
                <div class="d-flex justify-content-around my-2 pt-75">
                    <div class="d-flex align-items-start">
                        <span class="badge bg-light-primary p-75 rounded">
                            <i class="fa fa-phone"></i>
                        </span>
                        <div class="ms-75">
                            <h5 class="mb-0">{{$patient->email}}</h5>
                            <small>Email</small>
                        </div>
                    </div>
                </div>
                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Gender:</span>
                            <span>{{$patient->gender == 1 ? 'Male' : 'Female'}}</span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">City:</span>
                            <span>{{$patient->city}}</span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Country:</span>
                            <span>{{$patient->country}}</span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Medical History:</span>
                            <span>{{$patient->medical_history}}</span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Current Medications:</span>
                            <span>{{$patient->current_medications}}</span>
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
</div>
@endsection
