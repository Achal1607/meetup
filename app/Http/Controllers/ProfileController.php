<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'username' => 'required',
            'gender' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'place' => '',
            'education' => '',
            'avatar' => ['image','nullable'],
            'bio' => ''
        ]);
        if (request('avatar')) {
            $imagePath = request('avatar')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(250, 250);
            $image->save();

            auth()->user()->profile->update(array_merge(
                $data,
                ['avatar' => $imagePath]
            ));
        }
        else{
            auth()->user()->profile->update($data);
        }
        return redirect("/profile/{$user->id}");
    }
}
