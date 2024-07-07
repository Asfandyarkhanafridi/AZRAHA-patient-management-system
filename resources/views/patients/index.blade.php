@extends('layouts.nav')
@section('title', 'Patients')
@section('app-content', 'app-content')

@section('main-content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Patients</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Patients
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Page layout -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <form id="filterPatientDetail" class="d-flex align-items-center flex-grow-1">
                <div class="col-6 mt-2">
                    <div class="d-flex align-items-center">
                        <select name="patient_id" id="patient_id" class="form-select me-2 flex-grow-1">
                            <option value="">Search Patient by Name...</option>
                            @foreach (\App\Models\Patient::all() as $patient)
                                <option value="{{ $patient->id }}" {{ $filter['patient_id'] == $patient->id ? 'selected' : '' }}>{{$patient->id}}- {{ $patient->name }}</option>
                            @endforeach
                        </select>
                        <div class="col-auto">
                            <button class="btn btn-primary ms-1" type="submit" name="filterPatientDetail"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-info ms-1" type="button" onclick="removeFilterPatientDetail()"><i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            @can('patients_create')
                <a href="{{route('patients.create')}}" class="btn btn-primary ml-auto">
                    <i class="fa fa-plus"></i>&ensp;Add Patient
                </a>
            @endcan
        </div>

        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-nowrap w-100 display">
                    <thead>
                    <tr>
                        <th class="wd-15p">SrNo.</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-25p">Date of Birth</th>
                        <th class="wd-25p">Gender</th>
                        <th class="wd-25p">City</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-25p notExport" style="width: 2%; !important;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$patient->name}}</td>
                                <td>{{date('d-m-Y', strtotime($patient->date_of_birth))}}</td>
                                <td>{{$patient->gender == 1 ? 'Male' : 'Female'}}</td>
                                <td>{{$patient->city}}</td>
                                <td>{{$patient->phone}}</td>
                                <td class="pt-2">
                                {{--Actions--}}
                                    @php
                                        $crud = 'patients';
                                        $row = $patient->id;
                                    @endphp
                                    @include('partials.actions')
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-wrapper -->
            <div class="d-flex justify-content-between mt-2">
                <p>Total Entries: {{count(\App\Models\Patient::all())}}</p>
                 {{ $patients->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
    <!--/ Page layout -->
</div>
@endsection

