<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:users,username,' . auth()->user()->id, 'not_in:login,logout,register,edit-profile'],

        ]);
        if ($request->imageProfile) {
            $image = $request->file('imageProfile');
            $nameImage = Str::uuid() . '.' . $image->extension();
            $imageServer = Image::read($image)->resize(1000, 1000);
            $imagePath = public_path('profiles/' . $nameImage);
            $imageServer->save($imagePath);
        }
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $nameImage ?? auth()->user()->image ?? '';
        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
