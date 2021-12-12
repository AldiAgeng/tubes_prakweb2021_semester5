<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardMyProfileController extends Controller
{
    public function index(){
        return view('dashboard.myprofile.index');
    }

    public function edit(){
        return view('dashboard.myprofile.edit');
    }

    public function update(Request $request){
        
        $validate = $request->validate([
            'name' => ['required','max:24'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username,' . auth()->user()->id],
            'email' => ['required', 'email:dns', 'unique:users,email,' . auth()->user()->id]
        ]);

        auth()->user()->update($validate);

        return redirect('/dashboard/myprofile')->with('success', 'Profile has been updated!');
    }

}
