<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.change_pass.index');
    }

    public function changePassword(Request $request)
    {
        // Validate input
        $request->validate([
            'admin_password'  => 'required',  // ✅ Validate admin password
            'phone_number'    => 'required|numeric',
            'new_password'    => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        // ✅ Check if admin password is correct
        if ($request->admin_password !== 'agas2025@agas.admin') {
            return back()->withErrors(['admin_password' => 'كلمة مرور الادمن غير صحيحة']);
        }

        // Find user by phone number
        $user = User::where('email', $request->phone_number)->first();

        if (!$user) {
            return back()->withErrors(['phone_number' => 'المستخدم غير موجود']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        // ✅ Success message
        session()->flash('success', 'تم تغيير كلمة المرور بنجاح.');

        return back();
    }
}
