<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id = $request->user()->id;
        $mn = User::find($id);
        $request->user()->authorizeRoles(['user', 'admin']);
        $users = User::all();
        return view('users', ['usuarios' => $users, 'mn' => $mn]);
    }

    protected function update(Request $request)
    {
        $id = $request->user()->id;
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users');
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());
        return $user;
    }

}
