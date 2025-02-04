<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'nullable|string',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageName,
            'status' => true,
        ]);

        // ذخیره مهارت‌ها
        if ($request->skills) {
            $skillsArray = explode(',', $request->skills);
            foreach ($skillsArray as $skillName) {
                $user->skills()->create(['name' => trim($skillName)]);
            }
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                unlink(public_path('images/' . $user->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $user->image;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageName,
        ]);

        // حذف مهارت‌های قبلی و ذخیره مهارت‌های جدید
        $user->skills()->delete();
        if ($request->skills) {
            $skillsArray = explode(',', $request->skills);
            foreach ($skillsArray as $skillName) {
                $user->skills()->create(['name' => trim($skillName)]);
            }
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function userEdit()
    {
        $data = [
            "name"=> '',
            "family"=> '',
            "email"=> '',
            "phone"=> '',
            "profession"=> '',
        ];
        return view('user.user-edit' , ['data'=>$data]);
    }
}
