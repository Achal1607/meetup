<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    
    public function index(User $user)
    {
        return view('profile.index',compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);

        return view('profile.edit',compact('user'));
    }

    public function update(User $user)
    {
        
        $this->authorize('update',$user->profile);

           $data=request()->validate([
            'username'=>'required',
            'gender'=>'required',
            'day'=>'required',
            'month'=>'required',
            'year'=>'required',
            'place'=>'',
            'education'=>'',
            'avatar'=>''
        ]);
        auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id}");   
    }
}
