<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Users extends Controller
{
    public $userId = 0;

    public function __construct()
    {
        $this->userId = $_GET['id'] ?? 0;
    }


    public function index()
    {
        $users = User::all();
        return view('user.user-list', ['users' => $users]);
    }

    public function userEdit()
    {
        if ($this->userId) {
            $data = User::findOrFail($this->userId);
        } else {
            $data = [
                "firstName"  => null,
                "lastName"   => null,
                "email"      => null,
                "phone"      => null,
                "profession" => null,
                "status"     => '1',
                "image"      => asset('assets/image//temp/profile.jpg'),
            ];
        }


        return view('user.user-edit', $data);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->id ?? '' . ',id',
            'phone' => ['required', 'string', 'regex:/^09\d{9}$/'],
            'profession' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/image'), $imageName);
        }
        if ($validatedData['id']) {
            $data = User::findOrFail($validatedData['id']);
            deleteImage($data->image);
            $data->update([
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'profession' => $validatedData['profession'],
                'image' => $imageName!= null ? asset('assets/image/'.$imageName) : asset('assets/image/temp/profile.jpg')
            ]);
            return redirect()->back();
        } else {
            $user = User::create([
                'username' => randomText(8),
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'profession' => $validatedData['profession'],
                'image' => $imageName != null? asset('assets/image/'.$imageName) : asset('assets/image/temp/profile.jpg')
            ]);
            return redirect()->route('user.edit', ['id' => $user->id]);
        }


    }

    public function userChangeStatus(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|string|exists:users,id',
                'status' => 'required|boolean',
            ]);
            $user = User::find($validatedData['id']);
            if (!$user) {
                return response()->json([
                    'status' => 404,
                    'message' => 'کاربری با این شناسه یافت نشد.',
                ], 404);
            }
            $user->update(['status' => $validatedData['status']]);
            $status = $user->status == 1 ? 'فعال' : 'غیرفعال';
            return response()->json([
                'status' => 200,
                'message' => 'کاربر با موفقیت '.$status.' شد',
            ], 200);

        } catch (\Exception $e) {

            Log::error("Error updating user status: " . $e->getMessage());

            return response()->json([
                'status' => 500,
                'message' => 'خطایی داخلی رخ داد.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
