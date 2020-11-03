<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthLogRequest;

class AuthController extends Controller
{

		
    public function all(){
			$contact = new Users();
			return $contact->all();

    }
    public function sign_in(AuthLogRequest $req){
			$contact = new Users();
    		$mail = $req->input('mail');
    		$pas = md5($req->input('password'));
    		$date = $contact->where('mail', '=', $mail)->where('password', '=', $pas)->get('id');

			if(empty($date[0])){
				return redirect()->route('sign_in')->with('danger', "Mail или пароль неверный");
			}else{
				return redirect()->route('home')->with('success', 'Авторизация выполнена');
			}
    		return redirect()->route('home');
    }

    public function sign_up(AuthRequest $req){

			$contact = new Users();
    		$mail = $req->input('mail');

    		$date = $contact->where('mail', '=', $mail)->get('id');

			if(empty($date[0])){
				$contact->first_name = $req->input('login');
				$contact->last_name = $req->input('login2');
				$contact->mail = $req->input('mail');
				$contact->password = md5($req->input('password'));

				$contact->save();
	    		return redirect()->route('home')->with('success', 'Регестрация успешна');
			} else {
	    		return redirect()->route('sign_up')->with('danger', 'Пользователь с таким Mail уже зарегестрирован');

			}
			
    }
}
