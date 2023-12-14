<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Services\UserService;
use App\Http\Requests\AuthenticateRequest;

class LoginController extends Controller
{
    public function index(Request $request){
        $error = "";
        if( $request->get('error') == 1 ){
            $error = "Usuário e ou senha não existe";
        };
        if( $request->get('error') == 2 ){
            $error = "Necessário efetuar login";
        };
        
        return view("site.login",['title' => 'Login', 'error' => $error]);
    }
    
    public function authenticate(AuthenticateRequest $request){

        $validUser = new UserService();

        if($user = $validUser->validateUser($request)){
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
            return redirect()->route('app.home');
        }
        else{
            return redirect()->route('site.login',['error' => 1]);
        }
    }
    public function exit(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
