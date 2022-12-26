@extends('layouts.head')

@section('container')
<div class="wp-1">
    <a href="/transaction" class="btn btn-primary btn-icon-split btn-sm mb-1">
        <span class="icon text-white-50"><i class="bi bi-arrow-left-short"></i></span>
        <span class="text">Back</span>
    </a>
    <div class="title">
        Edit Transaction
    </div>
    <div class="form">
        <form method="post" action="/transaction/{{ $trd->id }}">
        @method('put')
        @csrf
        <div class="inputfield">
            <label>Transaction Name</label>
            <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" 
            value="{{ old('name', $trd->name) }}">
        </div>
        <div class="inputfield">
            <label>Category</label>
            <div class="custom_select">
                <select class="form-control form-control-user @error('category_id') is-invalid @enderror" name="category_id">
                    @foreach ($ctg as $wl)
                    @if(old('category_id', $trd->category_id) == $wl->id)
                        <option value="{{ $wl->id }}" selected>{{ $wl->name }}</option>
                    @else
                        <option value="{{ $wl->id }}">{{ $wl->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Wallet</label>
            <div class="custom_select">
                <select class="form-control form-control-user @error('wallet_id') is-invalid @enderror" name="wallet_id">
                    @foreach ($wlt as $wl)
                    @if(old('wallet_id', $trd->wallet_id) == $wl->id)
                        <option value="{{ $wl->id }}" selected>{{ $wl->name }}</option>
                    @else
                        <option value="{{ $wl->id }}">{{ $wl->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Mutation</label>
            <div class="custom_select">
                <select class="form-control form-control-user @error('mutation') is-invalid @enderror" name="mutation">
                    <option value="1" @if(old('mutation', $trd->mutation)==1) selected @else @endif>Income</option>
                    <option value="0" @if(old('mutation', $trd->mutation)==0) selected @else @endif>Expense</option>
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>amount</label>
            <input name="amount" type="number" class="form-control form-control-user @error('amount') is-invalid @enderror"
            value="{{ old('amount', $trd->amount) }}">
        </div>
        <div class="inputfield">
            <label>Description</label>
            <textarea name="description" class="form-control form-control-user @error('description') is-invalid @enderror"
            >{{ old('description', $trd->description) }}</textarea>
        </div>
        <div class="inputfield">
            <label>Date</label>
            <input name="date" type="datetime-local" class="form-control form-control-user @error('date') is-invalid @enderror"
            value="{{ old('date', $trd->date) }}">
        </div>
        <div class="inputfield">
            <button type="submit" value="Register" class="btn">update</button>
        </div>
        </form>
    </div>
</div>
@endsection