@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark"> {{ $trd->name }} </h5>
            <div class="text-dark-50 small">
                @if($trd->mutation == 1 )
                    income
                @else
                    expense
                @endif
            </div>
            
            <a href="/transaction" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50"><i class="bi bi-arrow-left-short"></i></span>
                <span class="text">Back</span>
            </a>
            <a href="" class="btn btn-warning btn-icon-split btn-sm ml-1" data-toggle="modal" 
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

                
                <div class="text-secondary">code:</div>
                <div class="text-warning mb-2">#{{ $trd->code }}</div>
                <div class="text-secondary">category:</div>
                <div class="text-warning mb-2">{{ $trd->category->name }}</div>
                <div class="text-secondary">wallet:</div>
                <div class="text-warning mb-2">{{ $trd->wallet->name }}</div>
                <div class="text-secondary">amount:</div>
                <div class="text-warning mb-2">{{ $trd->decimal }}</div>
                <div class="text-secondary">transaction date:</div>
                <div class="text-warning mb-2">{{ $trd->date }}</div>
                <div class="text-secondary">description:</div>
                <div class="text-warning mb-2">{{ $trd->description }}</div>
                <div class="text-secondary">create at:</div>
                <div class="text-warning mb-2">{{ $trd->created_at }}</div>
                <div class="text-secondary">update at:</div>
                <div class="text-warning mb-2">{{ $trd->updated_at }}</div>

                
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
                <form method="POST" action="/transaction/{{ $trd->id }}">
                    @method('put')
                    @csrf
                    <div>
                        <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="name" placeholder="name" value="{{ old('name', $trd->name) }}">
                        @error('name')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <textarea name="description" type="text" class="form-control form-control-user @error('description') is-invalid @enderror"
                            id="description" placeholder="description">{{ old('description', $trd->description) }}</textarea>
                        @error('description')
                        <div class="text-danger ml-2">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <div id="nf">Active</div>
                        <div>
                            <label class="lonf">
                                <input class="onof" type="checkbox" id="onof" onchange="actv()" 
                                @if(old('is_active', $trd->is_active) == 1) checked @else @endif>
                                <span class="obg"></span>
                                <a class="act"></a>
                            </label>
                        </div>
                        <input type="hidden" name="is_active" id="act" value="{{$trd->is_active}}">
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
                    <form action="/transaction/{{ $trd->id }}" method="POST"> 
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection