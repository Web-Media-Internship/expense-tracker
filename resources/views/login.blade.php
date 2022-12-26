@extends('layouts.loghead')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" aria-hidden="true">
            {{ session('success') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <form method="POST" action="/login" class="user">
        @csrf
                                        
        <!-- <input type="hidden" name="Login" value="true"></input> -->

        <div class="form-group">
            <input name="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                id="username" aria-describedby="emailHelp"
                placeholder="Enter Your Username..." value="{{ old('username') }}">
            @error('username')
            <div class="text-danger ml-2">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                id="password" placeholder="Password...">
            @error('password')
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
        <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>
        
        <hr>
        
    </form>
    <div class="text-center">
    </div>
    <div class="text-center">
        <a class="small" href="/forgot-password">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="/register">Create an Account!</a>
    </div>
@endsection