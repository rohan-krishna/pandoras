<?php

namespace pan\Http\Controllers;

use Illuminate\Http\Request;
use pan\User;

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
    	return view('users.create');
    }
}
