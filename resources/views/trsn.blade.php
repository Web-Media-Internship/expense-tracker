@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Transaction </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>Name</th>
                    </tr>
                    <tbody>
                        <tr>
                            @foreach($trn as $post)
                                <td>{{ $post->name }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection