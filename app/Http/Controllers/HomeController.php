<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->type == 'admin') {
            return view('admin.dashboard');
        } elseif ($user->type == 'user') {
            return view('user.dashboard');
        } else {
            return view('welcome');
        }
    }
}
