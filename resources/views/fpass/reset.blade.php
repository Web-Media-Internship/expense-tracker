@extends('layouts.loghead')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" aria-hidden="true">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-center">
        <p class="mb-4">enter the new password to change the password on the <h class="text-info">{{ $fpas->user->username }}</h></p>
    </div>
    <form method="POST" action="/reset-password/{{ $fpas->id }}" class="user">
        @csrf
                                        
        <!-- <input type="hidden" name="Login" value="true"></input> -->

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                    name="password" id="exampleInputPassword" placeholder="Password">
                    @error('password')
                    <div class="text-danger ml-2">
                        <small>{{ $message }}</small>
                    </div>
                    @enderror
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" id="exampleRepeatPassword" placeholder="Password Confirmation">
                    @error('password_confirmation')
                    <div class="text-danger ml-2">
                        <small>{{ $message }}</small>
                    </div>
                    @enderror
            </div>
            
            @if(session()->has('logerror'))
            <div class="text-danger ml-2">
                <small>{{ session('logerror') }}</small>
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block"> Update Password </button>
        
        <hr>
        
    </form>
    <div class="text-center">
    </div>
    <div class="text-center">
        <a class="small" href="/login">Back to login</a>
    </div>
@endsection