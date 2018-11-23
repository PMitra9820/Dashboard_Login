<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;


class HomeController extends Controller
{
    public function index(){
        return view('pages.index');        
    }
    public function home(){
            return view('pages.home');        
    }
    public function login(){
        return view('pages.login');
    }
   
    public function postLogin(Request $request){
        $email = $request->email;
        $password=$request->password;
        $obj = User::where('email','=', $email)
                        ->where('password','=',$password)
                        ->first();
        if($obj){
            Session::put('userid',$obj->id);
            return redirect('/home');
        }
        else{
            return redirect()->back();
            
        }
    }
    

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
 
}
