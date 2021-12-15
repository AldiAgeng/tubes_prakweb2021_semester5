<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DashboardChangePasswordController extends Controller
{
    public function edit(){
        return view('dashboard.myprofile.password.edit',[
            'title' => 'MyProfile'
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required','min:5','confirmed'],
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect('/dashboard/myprofile')->with('success', 'Password has been updated');
        }

        throw ValidationException::withMessages([
            'current_password' => 'You current password does not match with our record'
        ]);
        
    }
}
