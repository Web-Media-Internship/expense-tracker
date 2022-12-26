@extends('layouts.head')

@section('container')
<div class=" col-xl-8 col-lg-4 mb-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Update Password </h6>
        </div>
        <div class="card-body">            
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" aria-hidden="true">
                {{ session('success') }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            @if(session()->has('logerror'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" aria-hidden="true">
                {{ session('logerror') }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            @error('email')
            <div class="alert alert-success alert-dismissible fade show" role="alert" aria-hidden="true">
                {{ $message }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @enderror
            <div class="text-center">
                <p class="mb-4">To change the password, you must enter the current password!!</p>
            </div>
            <form method="POST" action="/update-password" class="user">
                @csrf
                
                <div class="form-group">
                    <input name="current_password" type="password" class="form-control form-control-user @error('current_password') is-invalid @enderror"
                        id="current_password" placeholder="current Password...">
                    @error('current_password')
                    <div class="text-danger ml-2">
                        <small>{{ $message }}</small>
                    </div>
                    @enderror
                    @if(session()->has('curerror'))
                    <div class="text-danger ml-2">
                        <small>{{ session('curerror') }}</small>
                    </div>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                            name="password" id="exampleInputPassword" placeholder="New Password...">
                            @error('password')
                            <div class="text-danger ml-2">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" id="exampleRepeatPassword" placeholder="Password Confirmation...">
                            @error('password_confirmation')
                            <div class="text-danger ml-2">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block"> Update Password </button>
                
                <hr>
                
            </form>
            <div class="text-center">
            </div>
            <div class="text-center">
                <a class="small" href="#" data-toggle="modal" data-target="#forpas">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>


    <!-- create modal -->
    <div class="modal fade" id="forpas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgot Password?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <br>
                <div class="text-center">
                    <p class="mb-4">Enter your email and we'll send you a code to reset your password!</p>
                </div>
                <div class="modal-body">
                <form method="POST" action="/forgot-password">
                    @csrf
                    <div class="form-group">
                        <input name="email" type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="email" placeholder="email..">
                        @error('email')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">send</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection