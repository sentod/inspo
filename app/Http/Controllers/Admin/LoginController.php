<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->role != "admin") {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access this page.');
            }
            return redirect()->route('admin.influencer');
        } else {
            return redirect()->route('admin.login')->with('error', 'Either email or password is incorrect.');
        }
    }

    
    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
