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
            ->where('mutation', 0);

        $m = Transaction::select(DB::raw("MONTHNAME(date) as bln"))
            ->GroupBy(DB::raw("MONTHNAME(date)"))
            ->OrderBy(DB::raw("MONTH(date)"))
            ->where('user_id', auth()->user()->id)
            ->where('mutation', 0);
            

        return view('dashboard', [
            "title" => "dashboard",
            "total" => $t->pluck('total'),
            "month" => $m->pluck('bln'),
            "mlink" => $m->get('bln')
        ]);
    }

    public function month($month)
    {
        
        $mn = Transaction::select(DB::raw("MONTHNAME(date) as bln"))
            ->GroupBy(DB::raw("MONTHNAME(date)"))
            ->OrderBy(DB::raw("MONTH(date)"))
            ->where('user_id', auth()->user()->id)
            ->where('mutation', 0)
            ->get('bln');
            
        $tr = Transaction::where(DB::raw('monthname(date)'), $month)
            ->get();

        $m = Transaction::where(DB::raw('monthname(date)'), $month)
            ->select(DB::raw("SUM(mutation) as mt"))
            ->where('user_id', auth()->user()->id)
            ->GroupBy("mutation")
            ->OrderBy("mutation")
            ->get('mt');
            
        $t = Transaction::where(DB::raw('monthname(date)'), $month)
            ->select(DB::raw("SUM(amount) as total"))
            ->where('user_id', auth()->user()->id)
            ->GroupBy("mutation")
            ->OrderBy("mutation")
            ->pluck('total');


        return view('month', [
            "title" => "Monthly Data",
            "mlink" => $mn,
            "mt" => $m,
            "tl" => $t,
            "trn" => $tr,
            "m" => $month
        ]);
    }
}
