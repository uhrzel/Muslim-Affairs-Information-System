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
        $users = User::all();

        if ($user->type == 'admin') {
            return view('admin.users.index', compact('users'));
        } elseif ($user->type == 'user') {
            return view('user.dashboard');
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chatify(Request $request)
    {
        $user = Auth::user();

        if ($user->type == 'admin') {
            return view('admin.chatify');
        } elseif ($user->type == 'user') {
            return view('user.chatify');
        } else {
            return view('welcome');
        }
    }
}
