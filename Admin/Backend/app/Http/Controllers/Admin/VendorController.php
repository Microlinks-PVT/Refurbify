<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class VendorController extends Controller
{
    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        // 1. Validate the data
        $request->validate([
            // --- CHANGED ---
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // --- END CHANGE ---
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'shop_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
        ]);

        // 2. Create the User
        $user = User::create([
            // --- CHANGED ---
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // --- END CHANGE ---
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'vendor', // Set the role!
            // --- ADDED ---
            'avatar' => 'avatar-1.jpg', // Default avatar
            'email_verified_at' => now() // Auto-verify vendor
            // --- END ADDED ---
        ]);

        // 3. Create the Vendor
        $vendor = Vendor::create([
            'user_id' => $user->id,
            'shop_name' => $request->shop_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->input('status', true),
        ]);

        // 4. Redirect
        return redirect()->route('admin.vendors.create')
                         ->with('success', 'Vendor created successfully!');
    }
}