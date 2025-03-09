<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    // Show login form
    public function showLoginForm() {
        return view('auth.login'); // Create login.blade.php in resources/views/auth
    }

  
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid login credentials');
    }

    // Admin dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}