<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('trsn', [
            "title" => "Transaction",
            "trn" => Transaction::all()
        ]);
    }
}
