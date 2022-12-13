@extends('layouts.head')

@section('container')
<div class="wp-1">
    <div class="title">
        Create new Transaction
    </div>
    <div class="form">
        <form method="post" action="/">
        @csrf
        <div class="inputfield">
            <label>Transaction Name</label>
            <input name="name" type="text" class="input">
        </div>
        <div class="inputfield">
            <label>Category</label>
            <div class="custom_select">
                <select name="transaction_category_id">
                    <option value="1">Select</option>
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Wallet</label>
            <div class="custom_select">
                <select name="wallet_id">
                    <option value="1">Select</option>
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Mutation</label>
            <div class="custom_select">
                <select name="mutation">
                    <option value="1">Income</option>
                    <option value="0">Expense</option>
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>amount</label>
            <input name="decimal" type="number" class="input">
        </div>
        <div class="inputfield">
            <label>Description</label>
            <textarea name="description" class="textarea"></textarea>
        </div>
        <div class="inputfield">
            <label>Date</label>
            <input name="date" type="datetime-local" class="input">
        </div>
        <div class="inputfield">
            <button type="submit" value="Register" class="btn">create</button>
        </div>
        </form>
    </div>
</div>
@endsection