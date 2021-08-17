<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class UsersController extends Controller
{
    public function index(){
        $leads = Lead::all();
        return view('admin.users.index',compact('leads'));
    }
}
