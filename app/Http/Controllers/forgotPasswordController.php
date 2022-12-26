<?php

namespace App\Http\Controllers;

use App\Models\Fpas;
use App\Mail\forgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;

class forgotPasswordController extends Controller
{
    public function index()
    {
        return view('fpass.mass', [
            "title" => "Forgot Password",
            "nm" => "Forgot Password?"
        ]);
    }

    public function email(Request $request)
    {
        $email = $request->validate([
            'email' => 'required|email:dns'
        ]);

        if(!User::where('email', $email)->exists()) {
            return back()->with('logerror', 'email not found');
        }

        $mi = DB::table('fpas')->select(DB::raw('MAX(RIGHT(id,1)) as kode'));
        if($mi->count()>0)
        {
            foreach($mi->get() as $k)
            {
                $id = ((int) $k->kode) + 1;
            }
        }else{
            $id = "1";
        }

        $idu = User::where('email', $request->email)->get('id');
        foreach($idu as $k)
        {
            $ui = ((int) $k->id);
        }
        $cd = date('ymdhis') + 146338246512;

        $validatedData['id'] = $id;
        $validatedData['user_id'] = $ui;
        $validatedData['code'] = $cd;
        $validatedData['expired_at'] = Carbon::now()->addMinutes(5);

        Fpas::Create($validatedData);

        $data = [
            'code' => $cd
        ];
        Mail::to("$request->email")->send(new forgotPassword($data));
        
        return redirect('/login')->with('success', 'Password reset link has been sent to your email!');
    }
    
    public function edit(fpas $fpas)
    {
        if(Carbon::now() > $fpas->expired_at)
        {
            Fpas::destroy($fpas->id);
            return back();
        }
        
        return view('fpass.reset', [
            "title" => "Reset Password",
            "fpas" => $fpas,
            "nm" => "Reset Password?"
        ]);
    }
    public function update(Request $request, fpas $fpas)
    {
        $ceckpassword = $request->validate([
            'password' => 'required|min:5|max:50',
            'password_confirmation' => 'required|same:password'
        ]);

    $validatedData['password'] = Hash::make($ceckpassword['password']);
    
    User::where('id', $fpas->user_id)->update($validatedData);
    Fpas::destroy($fpas->id);
    
    return redirect('/login')->with('success', 'New Password Has been updated!');

    }
}
