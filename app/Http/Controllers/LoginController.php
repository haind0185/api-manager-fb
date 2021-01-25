<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Validator;
use Redirect;
use App\User;

class LoginController extends Controller
{

	public function getLogin(Request $req)
	{
		if(Auth::check())
		{
            return redirect('admin');
        }
        else
        {
            return view('admin.login');
        }
    }

    public function postLogin(Request $req)
    {
    	$credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials))
        {
    		return redirect()->route('admin');
        }
        else
        {
            return redirect()->back()->with('notification','Email or password is incorrect.');
        }
    }

    public function getLogout()
    {
    	Auth::logout();
        return redirect()->back();
    }
}