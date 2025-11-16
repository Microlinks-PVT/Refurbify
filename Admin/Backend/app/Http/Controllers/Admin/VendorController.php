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
    public function index()
    {
        // Get all vendors, and load their related user data at the same time
        $vendors = Vendor::with('user')->latest()->get();

        return view('admin.vendors.index', compact('vendors'));
    }

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

    public function edit(Vendor $vendor)
    {
        // $vendor is automatically fetched by Laravel
        // We just need to pass it to the view
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        // 1. Validate the data
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // This rule makes sure the email is unique,
                // BUT ignores the vendor's own email address
                \Illuminate\Validation\Rule::unique('users')->ignore($vendor->user_id)
            ],
            'password' => ['nullable', Rules\Password::defaults()], // Password is now optional
            'shop_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'status' => ['required', 'boolean'],
        ]);

        // 2. Update the User model
        $vendor->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        // 3. Update password ONLY if a new one was entered
        if ($request->filled('password')) {
            $vendor->user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        // 4. Update the Vendor model
        $vendor->update([
            'shop_name' => $request->shop_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        // 5. Redirect back to the list
        return redirect()->route('admin.vendors.index')
                         ->with('success', 'Vendor updated successfully!');
    }
}