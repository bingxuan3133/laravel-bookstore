<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request with role-based redirection.
     */
    public function login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Role-based redirection
            return $this->redirectBasedOnRole($user);
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Redirect user based on their role.
     */
    protected function redirectBasedOnRole($user)
    {
        // Check if user has a role relationship
        if ($user->role) {
            switch ($user->role) {
                case UserRole::Admin:
                    return redirect()->intended(route('admin.dashboard'));

                case UserRole::Seller:
                    return redirect()->intended(route('seller.dashboard'));

                case UserRole::User:
                default:
                    return redirect()->intended(route('home'));
            }
        }

        // Fallback if no role is set
        return redirect()->intended(route('home'));
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
