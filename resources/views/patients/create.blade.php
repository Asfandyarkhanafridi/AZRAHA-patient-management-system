@extends('layouts.nav')
@section('title', 'Patient Create')
@section('app-content', 'app-content')

@section('main-content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Add Patient</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('patients.index')}}">Patients</a>
                        </li>
                        <li class="breadcrumb-item active">Add Patient
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
        @include('partials.message')
        <div class="card-header">
            <h4 class="card-title">Add Patient</h4>
        </div>
        <form method="POST" action="{{route('patients.store')}}">
            <div class="card-body">
                @csrf
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


                    <div class="col-md-6">
                        <label class="form-label required">{{ __('Medical History') }}</label>
                        <textarea name="medical_history" class="form-control form-text form-control-lg @error('medical_history') is-invalid @enderror" placeholder="{{ __('Medical History') }}" >{{ old('medical_history')}}</textarea>
                        @if($errors->has('medical_history'))
                            <div class="text-danger">
                                {{ $errors->first('medical_history') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">{{ __('Current Medications') }}</label>
                        <textarea name="current_medications" class="form-control form-text form-control-lg @error('current_medications') is-invalid @enderror" placeholder="{{ __('Current Medications') }}" >{{ old('current_medications')}}</textarea>
                        @if($errors->has('current_medications'))
                            <div class="text-danger">
                                {{ $errors->first('current_medications') }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                <a href="{{route('patients.index')}}" type="button" class="btn btn-secondary">Back</a>

            </div>
        </form>
    </div>
    <!--/ Page layout -->
</div>
@endsection
