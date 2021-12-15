<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DashboardMyProfileController extends Controller
{
    public function index(){
        return view('dashboard.myprofile.index',[
            'title' => 'MyProfile'
        ]);
    }

    public function edit(){
        return view('dashboard.myprofile.edit',[
            'title' => 'MyProfile'
        ]);
    }

    public function update(Request $request){
        
        $validate = $request->validate([
            'name' => ['required','max:24'],
            'bio' => ['required'],
            'avatar' => 'image|file|max:1024',
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username,' . auth()->user()->id],
            'email' => ['required', 'email:dns', 'unique:users,email,' . auth()->user()->id]
        ]);

        if($request->file('avatar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['avatar'] = $request->file('avatar')->store('avatar-images');
        }

        auth()->user()->update($validate);

        return redirect('/dashboard/myprofile')->with('success', 'Profile has been updated!');
    }

}
