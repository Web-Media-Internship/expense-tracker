@extends('layouts.loghead')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" aria-hidden="true">
        {{ session('success') }}
    </div>
    @endif
    <div class="text-center">
        <p class="mb-4">Enter your email and we'll send you a code to reset your password!</p>
    </div>
    <form method="POST" action="/forgot-password" class="user">
        @csrf
                                        
        <!-- <input type="hidden" name="Login" value="true"></input> -->

        <div class="form-group">
            <input name="email" type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                id="email" aria-describedby="emailHelp"
                placeholder="Enter Your Email..." value="{{ old('email') }}">
            @error('email')
            <div class="text-danger ml-2">
                <small>{{ $message }}</small>
            </div>
            @enderror
            
            @if(session()->has('logerror'))
            <div class="text-danger ml-2">
                <small>{{ session('logerror') }}</small>
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block"> Send Code </button>
        
        <hr>
        
    </form>
    <div class="text-center">
    </div>
    <div class="text-center">
        <a class="small" href="/login">Back to login</a>
    </div>
@endsection