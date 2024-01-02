<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display all the users
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Delete user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with([
            'success' => 'User has been deleted successfully'
        ]);
    }
}
