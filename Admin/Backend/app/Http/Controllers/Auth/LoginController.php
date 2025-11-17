<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // <-- ADD THIS

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // We are replacing this with the redirectTo() method below
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // --- ADD THIS ENTIRE METHOD ---
    /**
     * Get the post-login redirect path.
     *
     * @return string
     */
    public function redirectTo()
    {
        $user = Auth::user();

        // Check user role and redirect
        switch ($user->role) {
            case 'admin':
                return route('admin.vendors.index'); // Admin dashboard
            case 'vendor':
                // Also check if vendor is 'active'
                if ($user->vendor && $user->vendor->status == 1) {
                    return route('vendor.dashboard'); // Vendor dashboard
                } else {
                    // If vendor is inactive, log them out and send to login
                    // with an error message.
                    Auth::logout();
                    // We'll need to show this error on the login page
                    return redirect('/login')->with('error', 'Your vendor account is not active.');
                }
            default:
                return RouteServiceProvider::HOME; // Default for 'user'
        }
    }
    // --- END OF NEW METHOD ---
}