@extends('layouts.nav')
@section('title', 'Patient')
@section('more-style')

@endsection
@section('main-content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Patient</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Patient</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Page layout -->
        <div class="col-xl-4">
            <div class="card">
                <div class="d-flex align-items-center row">
                    <div class="col-7 d-flex flex-column justify-content-center">
                        <div class="card-body">
                            <h5 class="card-title mb-0">Total Patients</h5>
                            <h4 class="text-primary mb-1">{{$totalPatients}}</h4>
                            <a href="{{route('patients.index')}}" class="btn btn-primary waves-effect waves-light mt-2">View Patients</a>
                        </div>
                    </div>
                    <div class="col-5 text-center">
                        <div class="card-body pb-0 px-0 px-md-4 d-flex justify-content-center align-items-center">
                            <img src="{{asset('app-assets/images/illustration/demand.svg')}}" style="height: 140px; width: auto;" alt="view sales">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Page layout -->
    </div>
@endsection
@section('more-script')

@endsection
