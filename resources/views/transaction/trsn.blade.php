@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Transaction </h6>
            <a href="/category" class="btn btn-info btn-icon-split btn-sm">
                <span class="icon text-white-50"><i class="bi bi-tag-fill"></i></span>
                <span class="text">view category</span>
            </a>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-xl-6 col-lg-4" data-toggle="alert">
                {{ session('success') }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            <a href="/transaction/create">
                <div class=""><i class="bi bi-plus-circle"></i> create new Transaction</div>
            </a>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered mb-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>code</th>
                            <th>mutation</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trn as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>#{{ $post->code }}</td>
                            <td>
                                @if($post->mutation == 1)
                                income
                                @else
                                expense
                                @endif
                            </td>
                            <td>
                            <a href="/transaction/{{ $post->slug }}" class="btn btn-secondary btn-icon-split btn-sm mb-1">
                                <span class="text dark">Detail</span>
                                <span class="icon text-white-50"><i class="fas fa-arrow-right"></i></span>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection