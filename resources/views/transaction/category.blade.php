@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Category </h6>
        </div>
        <div class="card-body">            
            <div class="table-responsive">
                
                <!-- error/success message -->
                @error('name')
                <div class="alert alert-success alert-dismissible fade show col-xl-6 col-lg-4" data-toggle="alert">
                    {{ $message }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @enderror
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-xl-6 col-lg-4" data-toggle="alert">
                    {{ session('success') }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif

                
                <a href="#" data-toggle="modal" data-target="#createwg">
                    <div class=""><i class="bi bi-plus-circle"></i> Add Category</div>
                </a>
            </div>
            @foreach($ctg as $post)
            <li class="list-group-item col-xl-8 col-lg-4">
                {{ $post->name }}
                <a href="/category/{{ $post->id }}" class="btn btn-secondary btn-icon-split btn-sm float-right ml-3">
                    <span class="text dark">Detail</span>
                    <span class="icon text-white-50"><i class="fas fa-arrow-right"></i></span>
                </a>
                @if($post->is_active == 1 )
                <a class="btn-warning btn-icon-split btn-sm float-right ml-1">
                    <span class="text dark">active</span>
                </a>
                @else
                <a class="btn-danger btn-icon-split btn-sm float-right ml-1">
                    <span class="text dark">non active</span>
                </a>
                @endif
            </li>
            @endforeach
        </div>
    </div>


    <!-- create modal -->
    <div class="modal fade" id="createwg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Wallet Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/category">
                    @csrf
                    <div>
                        <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="name" placeholder="name">
                        @error('name')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <textarea name="description" type="text" class="form-control form-control-user @error('description') is-invalid @enderror"
                            id="description" placeholder="description"></textarea>
                        @error('description')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <input name="is_active" type="hidden"
                            id="is_active" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">add</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection