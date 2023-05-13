<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request){
        $credencias = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credencias)){
            $login['success'] = true;
            echo json_encode($login);
            return;
        }
        $login['success'] = false;
        $login['message'] = 'Dados invalidos';
        echo json_encode($login);
        return;
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        return redirect()->route('welcome');
    }


}
