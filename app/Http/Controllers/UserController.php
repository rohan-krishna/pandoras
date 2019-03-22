<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        # code...
        $users = auth()->user()->organisation->users;
        return view('users.index',compact('users'));
    }

    public function create()
    {
        # code...
        return view('users.create');
    }

    public function store(Request $request)
    {
        # code...
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'status' => 'required'
        ]);


        $user = DB::transaction(function() use($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'organisation_id' => auth()->user()->organisation->id,
                'status' => $request->status
            ]);

            return $user;
        });

        
        if($user) {
            alert('Success','User created successfully.','success')->persistent();
            return redirect('admin/user-management');
        } else {
            alert('Oops!','Something went wrong. Please try again later.','error')->persistent();
            return redirect()->back();
        }
        
    }

    public function edit(User $user)
    {
        # code...
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        # code...
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'email|required|unique:users',
            // 'password' => 'required|confirmed',
            'status' => 'required'
        ]);
        
        DB::transaction(function() use($request, $user) {
            $user->name = $request->name;
            $user->status = $request->status;
            $user->update();
        });

        alert()->info('Updated!','User information has been updated successfully.')->persistent();

        return redirect()->route('userIndex');

    }

    public function delete(User $user)
    {
        # code...
        $user->delete();
        alert()->info('Deleted!','User has been deleted successfully.');
        return redirect()->route('userIndex');
    }
}
