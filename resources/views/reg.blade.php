@extends('layouts.loghead')

@section('container')
    <form method="POST" action="" class="/register">
        
    @csrf
                                        
        <!-- <input type="hidden" name="Login" value="true"></input> -->

        <div class="form-group">
            <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                id="name" aria-describedby="emailHelp"
                placeholder="Enter Your Name..." value="{{ old('name') }}">
                @error('name')
                <div class="text-danger ml-2">
                    <small>{{ $message }}</small>
                </div>
                @enderror
        </div>
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
            <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                id="email" aria-describedby="emailHelp"
                placeholder="Enter Your Email..." value="{{ old('email') }}">
                @error('email')
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
        </div>
        <div class="form-group">
            <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                id="password_confirmation" placeholder="Enter password confirmation...">
                @error('password_confirmation')
                <div class="text-danger ml-2">
                    <small>{{ $message }}</small>
                </div>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block"> <a href="/" class=""></a> Register </button>
        
        <hr>
        
    </form>
    <div class="text-center">
    </div>
    <div class="text-center">
        <small>have an account? </small><a class="small" href="/login">Login!</a>
    </div>
@endsection