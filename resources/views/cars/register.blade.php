@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Car</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('carRegister') }}" aria-label="{{ __('New Car') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('name') }}" required autofocus>

                               {{--  @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regno" class="col-md-4 col-form-label text-md-right">{{ __('Registeration Number') }}</label>

                            <div class="col-md-6">
                                <input id="regno" type="text" class="form-control{{ $errors->has('regno') ? ' is-invalid' : '' }}" name="regno" value="{{ old('regno') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vinno" class="col-md-4 col-form-label text-md-right">{{ __('VIN Number') }}</label>

                            <div class="col-md-6">
                                <input id="vinno" type="text" class="form-control{{ $errors->has('vinno') ? ' is-invalid' : '' }}" name="vinno" value="{{ old('vinno') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="man_year" class="col-md-4 col-form-label text-md-right">{{ __('Year of Manufacture') }}</label>

                            <div class="col-md-6">
                                <input id="man_year" type="text" class="form-control{{ $errors->has('man_year') ? ' is-invalid' : '' }}" name="man_year" value="{{ old('man_year') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_origin" class="col-md-4 col-form-label text-md-right">{{ __('Country of Origin') }}</label>

                            <div class="col-md-6">
                                <input id="country_origin" type="text" class="form-control{{ $errors->has('country_origin') ? ' is-invalid' : '' }}" name="country_origin" value="{{ old('country_origin') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mileage" class="col-md-4 col-form-label text-md-right">{{ __('Mileage') }}</label>

                            <div class="col-md-6">
                                <input id="mileage" type="text" class="form-control{{ $errors->has('mileage') ? ' is-invalid' : '' }}" name="mileage" value="{{ old('mileage') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="insurance" class="col-md-4 col-form-label text-md-right">{{ __('Type of Insurance') }}</label>

                            <div class="col-md-6">
                                <input id="insurance" type="text" class="form-control{{ $errors->has('insurance') ? ' is-invalid' : '' }}" name="insurance" value="{{ old('insurance') }}" required>
{{-- 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
