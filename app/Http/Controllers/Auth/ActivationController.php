<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
    	$user = User::byActivationColumns($request->email, $request->token)->firstOrFail();

    	$user->update([
    		'active' => true,
    		'activation_token' => null 
    	]);

    	Auth::loginUsingId($user->id);

    	return redirect()->route('home')->withSuccess('Activate, you are now signed in');
    }
}
