<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{   
    public function verifyLogin(Request $request)
    {                
        $usuario = $_POST['user'];
        $senha = md5($_POST['password']);
        $checkUser = DB::select("SELECT * FROM `users` WHERE name = '$usuario' AND password = '$senha'");
        if (!empty($checkUser)) {                   
            $request->session()->put('user', $usuario);  
            return view("dashboard");            
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->intended('/');
    }
}
