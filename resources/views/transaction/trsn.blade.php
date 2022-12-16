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
            <div class="table-responsive">
                <a href="/transaction/create">
                    <div class=""><i class="bi bi-plus-circle"></i> create new Transaction</div>
                </a>
                <table id="dataTable" width="100%" cellspacing="0">
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
                            <a href="/transaction/{{ $post->id }}" class="btn btn-secondary btn-icon-split btn-sm mb-1">
                                <span class="text dark">Detail</span>
                                <span class="icon text-white-50"><i class="fas fa-arrow-right"></i></span>
                            </a>
                            </td>
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
                                            <form action="/transaction/{{ $post->id }}" method="POST"> 
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
@endsection