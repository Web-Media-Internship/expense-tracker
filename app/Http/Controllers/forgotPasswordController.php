<?php

namespace App\Http\Controllers;

use App\Models\Fpas;
use App\Mail\forgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
            return back()->with('logerror', 'e-mail not registered');
        }

        $mi = DB::table('fpas')->select(DB::raw('MAX(id) as kode'));
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
        $date = Carbon::now()->addMinutes(5);

        $validatedData['id'] = $id;
        $validatedData['user_id'] = $ui;
        $validatedData['code'] = $cd;
        $validatedData['expired_at'] = $date;

        Fpas::Create($validatedData);

        $data = [
            'code' => $cd
        ];
        Mail::to("$request->email")->send(new forgotPassword($data));
        
        return back()->with('success', 'Password reset link has been sent to your email!');
    }
    
    public function edit($fpas)
    {

        $fps = Fpas::where('code', $fpas);
        
        if(!$fps->count()>0){
            if(Auth::check()) {
                return redirect('/update-password')->with('logerror', "Resend your email, and we'll give you a new link");
            }
            return redirect('/forgot-password')->with('success', "Resend your email, and we'll give you a new link");
        }

        
        foreach ($fps->get() as $key) {
            $fp = $key;
        }
        
        if(Carbon::now() > $fp->expired_at)
        {
            Fpas::destroy($fp->id);
            return redirect('/forgot-password')->with('success', "Your password reset link has expired");
        }
        
        return view('fpass.reset', [
            "title" => "Reset Password",
            "fpas" => $fp,
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

    public function check(Request $request)
    {
        return view('fpass.uppas', [
            "title" => "Update Password",
        ]);
    }

    public function change(Request $request)
    {
        $ceckpassword = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|max:50',
            'password_confirmation' => 'required|same:password'
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            return back()->with('curerror', 'your currnet password does not match with our record');
        }
        $validatedData['password'] = Hash::make($ceckpassword['password']);
        
        User::where('id', auth()->user()->id)->update($validatedData);
        
        return back()->with('success', 'New Password Has been updated!');

    }
}
