<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontUser;
use Session;
use Auth;
use User;
class FrontController extends Controller
{
    public function userLogin(Request $request){
		if($request->isMethod('post')){
			$userData = $request->all();
			//$userCount = FrontUser::where(['email'=>$userData['email'],'password'=>$userData['password']])->count();
			if(Auth::attempt(['email'=>$userData['email'],'password'=>$userData['password']])){
				Session::put('FrontUserSession', $userData['email']);
				return redirect('/user/dashboard');
			}			
		}
		return view('front.front_login');
	}
	
	public function userdashboard(){
		if(Auth::check()){
			return view('front.home');
		}
	}
	public function userLogout(){
		Session::flush();
		return redirect('/');
	}
}
