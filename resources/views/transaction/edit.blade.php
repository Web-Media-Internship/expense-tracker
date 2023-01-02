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
    @if($errors->any())
    <small><a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" 
            data-target="#warModal">
        <span class="icon text-white-50">
            <i class="fas fa-exclamation-triangle"></i>
        </span>
        <span class="text">Click this button for all Errors</span>
    </a></small>
    <hr>
    @endif
    <div class="form">
        <form method="post" action="/transaction/{{ $trd->slug }}">
        @method('put')
        @csrf
        <div class="inputfield">
            <label>Transaction Name</label>
            <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" 
            value="{{ old('name', $trd->name) }}" autocomplete="off">
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
            <input name="amount" type="text" class="form-control form-control-user @error('amount') is-invalid @enderror"
            value="{{ old('amount', number_format($trd->amount, 0, ',', '.')) }}" id="inputku" onkeydown="return numbersonly(this, event);"
            onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
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

<!-- Warning Modal-->
<div class="modal fade" id="warModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make sure to enter the word correctly!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body ml-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('template/js/point.js') }}"></script>
@endsection