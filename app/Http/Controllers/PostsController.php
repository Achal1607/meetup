<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Nullable;

class PostsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'image' => ['image', 'nullable'],
            'caption' => ['required', 'string'],
            'feeling' => 'string'

        ]);
        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1400, 1400);
            $image->save();
            auth()->user()->posts()->create([
                'caption' => $data['caption'],
                'image' => $imagePath,
                'feeling' => $data['feeling']
            ]);
        } else {
            auth()->user()->posts()->create([
                'caption' => $data['caption'],
                'feeling' => $data['feeling']
            ]);
        }
        return redirect('profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
