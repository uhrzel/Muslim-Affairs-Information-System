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
            return view('admin.dashboard', compact('users'));
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

    /**
     * Show the user profile in admin dashboard.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userProfile(Request $request)
    {
        $user = User::find($request->id);

        return view('admin.user.profile', compact('user'));
    }

    /**
     * Edit the user profile in admin dashboard.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userEdit(Request $request)
    {
        $user = User::find($request->id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the user profile in admin dashboard.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userUpdate(Request $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.userProfile', $user->id)->with('success', 'User updated successfully');
    }

    /**
     * Delete the user profile in admin dashboard.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userDelete(Request $request)
    {
        $user = User::find($request->id);

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
}
