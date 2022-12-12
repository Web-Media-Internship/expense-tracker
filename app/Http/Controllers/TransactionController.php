<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.trsn', [
            "title" => "Transaction",
            "trn" => Transaction::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
