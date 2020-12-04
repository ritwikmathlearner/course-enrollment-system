<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::find(auth()->id());

        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = User::find(auth()->id());

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->id());

        if ($request->password != null) {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'birth_date' => ['required', 'date', 'before:today'],
                'type' => ['required', 'integer'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            if (!Hash::check($request->oldPassword, $user->password)) {
                return back();
            } else {
                $validatedData['password'] = Hash::make($request->password);
            }
        } else {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'birth_date' => ['required', 'date', 'before:today'],
                'type' => ['required', 'integer'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        }

        User::where('id', auth()->id())->update($validatedData);

        return redirect('/profile');
    }
}
