<?php

namespace pan\Http\Controllers;

use Illuminate\Http\Request;
use pan\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    public function index()
    {
    	$users = User::latest()->get();
    	return view('users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
    	return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        $user->syncRoles($request->input('roles'));

        alert()->success("New user successfully created.","Success!")->persistent("Cool!");

        return redirect('users');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit',compact(['user','roles']));
    }

    public function update(User $user,Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);

        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->update();

        $user->syncRoles($request->roles);

        alert()->info("User info has been updated.","Success!")->persistent("Cool!");

        return redirect('users');
    }
}
