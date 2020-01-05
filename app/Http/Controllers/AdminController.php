<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;
class AdminController extends Controller
{
    public function adminLogin(Request $request){
		if($request->isMethod('post')){
			$adminData = $request->all();
			$adminCount = Admin::where(['email'=>$adminData['email'],'password'=>md5($adminData['password']),'status'=>1])->count();
			if($adminCount >0){
				$adminDetails = Admin::where(['email'=>$adminData['email'],'password'=>md5($adminData['password']),'status'=>1])->first()->toArray();
				Session::put('AdminSession',$adminDetails);
				return redirect('/admin/dashboard');
			}
		}
		return view('backend.admin_login');
	}
	
	public function admindashboard(){
		return view('backend.home');
	}
	
	public function adminLogout(){
		Session::flush();
		return redirect('/');
	}
}
