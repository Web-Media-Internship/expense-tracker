<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Fpas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $fpas = Fpas::where('user_id', auth()->user()->id);
        if ($fpas->count() > 0) {
            foreach ($fpas->get() as $fp) {
                if (Carbon::now() > $fp->expired_at) {
                    Fpas::destroy($fp->id);
                }
            }
        }


        $t = Transaction::select(DB::raw("SUM(amount) as total"))
            ->GroupBy(DB::raw("Month(date)"))
            ->OrderBy(DB::raw("Month(date)"))
            ->where('user_id', auth()->user()->id)
            ->where('mutation', 0)
            ->pluck('total');

        $m = Transaction::select(DB::raw("MONTHNAME(date) as bln"))
            ->GroupBy(DB::raw("MONTHNAME(date)"))
            ->OrderBy(DB::raw("MONTH(date)"))
            ->where('user_id', auth()->user()->id)
            ->where('mutation', 0)
            ->pluck('bln');

        return view('dashboard', [
            "title" => "dashboard",
            "total" => $t,
            "month" => $m
        ]);
    }
}
