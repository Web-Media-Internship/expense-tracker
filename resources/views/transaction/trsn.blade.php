@extends('layouts.head')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Transaction </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>mutation</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($trn as $post)
                                <td>{{ $post->name }}</td>
                                <td>
                                    @if($post->mutation == 1)
                                    income
                                    @else
                                    expense
                                    @endif
                                </td>
                                <td></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection