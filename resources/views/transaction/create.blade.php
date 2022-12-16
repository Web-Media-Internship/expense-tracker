@extends('layouts.head')

@section('container')
<div class="wp-1">
    <a href="/transaction" class="btn btn-primary btn-icon-split btn-sm mb-1">
        <span class="icon text-white-50"><i class="bi bi-arrow-left-short"></i></span>
        <span class="text">Back</span>
    </a>
    <div class="title">
        Create new Transaction
    </div>
    <div class="form">
        <form method="post" action="/transaction">
        @csrf
        <div class="inputfield">
            <label>Transaction Name</label>
            <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror">
        </div>
        <div class="inputfield">
            <label>Category</label>
            <div class="custom_select">
                <select class="form-control form-control-user" name="category_id">
                    @foreach ($ctg as $wl)
                    @if($wl->is_active == 1 ) <option value="{{ $wl->id }}">{{ $wl->name }}</option> @else @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Wallet</label>
            <div class="custom_select">
                <select class="form-control form-control-user" name="wallet_id">
                    @foreach ($wlt as $wl)
                    @if($wl->is_active == 1 ) <option value="{{ $wl->id }}">{{ $wl->name }}</option> @else @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Mutation</label>
            <div class="custom_select">
                <select class="form-control form-control-user" name="mutation">
                    <option value="1">Income</option>
                    <option value="0">Expense</option>
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>amount</label>
            <input name="decimal" type="number" class="form-control form-control-user">
        </div>
        <div class="inputfield">
            <label>Description</label>
            <textarea name="description" class="form-control form-control-user"></textarea>
        </div>
        <div class="inputfield">
            <label>Date</label>
            <input name="date" type="datetime-local" class="form-control form-control-user">
        </div>
        <div class="inputfield">
            <button type="submit" value="Register" class="btn">create</button>
        </div>
        </form>
    </div>
</div>
@endsection