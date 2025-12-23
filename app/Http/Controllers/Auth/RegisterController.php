<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seller;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'role' => ['required', 'in:buyer,seller'],
            'store_name' => ['required_if:role,seller', 'nullable', 'string', 'max:255'],
            'store_description' => ['required_if:role,seller', 'nullable', 'string', 'max:1000'],
            // 'terms' => ['required', 'accepted'],
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] === 'seller' ? UserRole::Seller->value : UserRole::User->value,
        ]);

        // Create seller if role is seller
        if ($validated['role'] === 'seller') {
            Seller::create([
                'user_id' => $user->id,
                'name' => $validated['store_name'],
                'description' => $validated['store_description'],
                'is_approved' => false, // Pending approval
            ]);
        }

        // Log the user in
        Auth::login($user);

        // Redirect based on role
        if ($user->role === UserRole::Seller->value) {
            return redirect()->route('seller.dashboard')
                ->with('message', 'Welcome! Your seller account is pending approval.');
        }

        return redirect()->route('home')
            ->with('message', 'Welcome to Bookoo!');
    }
}
