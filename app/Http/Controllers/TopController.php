<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;

class TopController extends Controller
{

	public function home(Request $req)
	{
        return view('admin.home');
    }
}