@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark"> {{ $wlt->name }} </h5>
            <div class="text-dark-50 small">
                @if($wlt->is_active == 1 )
                    active
                @else
                    non active
                @endif
            </div>
            
            <a href="/walletgroup" class="btn btn-primary btn-icon-split btn-sm mb-1">
                <span class="icon text-white-50"><i class="bi bi-arrow-left-short"></i></span>
                <span class="text">back</span>
            </a>
            <a href="" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" 
            data-target="#editwg">
                <span class="icon text-white-50"><i class="bi bi-pencil"></i></span>
                <span class="text">Edit</span>
            </a>
            <a href="" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" 
            data-target="#delModal">
                <span class="icon text-white-50"><i class="bi bi-trash3"></i></span>
                <span class="text">delete</span>
            </a>
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


                <div class="row col-lg-8 mb-4">
                    <a href="#" data-toggle="modal" data-target="#createwl">
                        <div class=""><i class="bi bi-plus-circle"></i> Add Wallet</div>
                    </a>

                    <div class="table-responsive">
                    <ul class="list-group">
                        @foreach($wl as $post)
                        <li class="list-group-item">
                            {{ $post->name }}
                            <a href="/wallet/{{ $post->slug }}" class="btn btn-secondary btn-icon-split btn-sm float-right ml-3">
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
                    </ul>
                    </div>
                </div>
                <hr class="sidebar-divider">
                create at: {{ $wlt->created_at }} <h class="float-right">update at: {{ $wlt->updated_at }}</h>
            </div>

            </div>
        </div>
    </div>


    <!-- create modal -->
    <div class="modal fade" id="createwl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Wallet</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/wallet">
                    @csrf
                    <div>
                        <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="name" placeholder="name" value="{{ old('name') }}" autocomplete="off">
                        @error('name')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <textarea name="description" type="text" class="form-control form-control-user @error('description') is-invalid @enderror"
                            id="description" placeholder="description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <input name="wallet_group_id" type="hidden"
                            id="wallet_group_id" value="{{ $wlt->id }}">
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


    <!-- edit modal -->
    <div class="modal fade" id="editwg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Wallet Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/walletgroup/{{ $wlt->slug }}">
                    @method('put')
                    @csrf
                    <div>
                        <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="name" placeholder="name" value="{{ old('name', $wlt->name) }}" autocomplete="off">
                        @error('name')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <div id="nf">@if(old('is_active', $wlt->is_active) == 1) Active @else Not Active @endif</div>
                        <div>
                            <label class="lonf">
                                <input class="onof" type="checkbox" id="onof" onchange="actv()" 
                                @if(old('is_active', $wlt->is_active) == 1) checked @else @endif>
                                <span class="obg"></span>
                                <a class="act"></a>
                            </label>
                        </div>
                        <input type="hidden" name="is_active" id="act" value="{{$wlt->is_active}}">
                        @error('is_active')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function actv()
        {
            let onof = document.getElementById('onof');
            let nf = document.getElementById('nf');

            if (onof.checked){
                act.value = '1';
                nf.innerHTML = 'Active';
            }else{
                act.value = '0';
                nf.innerHTML = 'Not Active';
            }
        }
    </script>


    <!-- delete Modal-->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Want to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "delete" to delete data!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/walletgroup/{{ $wlt->slug }}" method="POST"> 
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection