@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Wallet Group </h6>
        </div>
        <div class="card-body">            
            <div class="table-responsive">
                <a class="" href="">
                    <div class=""><i class="bi bi-plus-circle"></i> Add Wallet Group</div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-4">
                <div class="table-responsive  mt-2">
                    <a class="alert dropdown-item d-flex align-items-center bg-warning border-left-info" href="">
                        <div>
                            <div class="text-light">Wallet</div>
                            <div class="small text-white-500">active</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection