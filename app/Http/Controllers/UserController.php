<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;
use App\User;

class UserController extends Controller
{

	public function __construct()
    {
    	$this->m_user = new User;    
    }

	public function index(Request $req)
	{
		$users = $this->m_user->getDataAdmin();
        return view('admin.user.index', ['users' => $users]);
    }

    public function renew(Request $req)
    {
    	if(!$user = User::find($req->id))
    	{
        	return response()->json(['message' => 'Not found'], 404);
        }

        $next_time = time() + (config('cf_setting.TIME_RENEW') * 24 * 60 * 60);
        $next_time = date('Y-m-d H:i:s', $next_time);
        $user->expires_time = $next_time;
        $user->expires = config('define.M_EXPIRES_ON');

        $user->save();
        $data = $user->toArray();
    	return response()->json(['message' => 'Succesfully', 'status' => 200, 'data' => $data], 200);
    }

    public function disrenew(Request $req)
    {
    	if(!$user = User::find($req->id))
    	{
        	return response()->json(['message' => 'Not found'], 404);
        }

        $next_time = date('Y-m-d H:i:s', time());
        $user->expires_time = $next_time;
        $user->expires = config('define.M_EXPIRES_OFF');

        $user->save();
        $data = $user->toArray();
    	return response()->json(['message' => 'Succesfully', 'status' => 200, 'data' => $data], 200);
    }
}