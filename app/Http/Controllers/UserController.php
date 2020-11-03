<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthLogRequest;



class UserController extends Controller
{
    public function index(){
		$users = Users::all();
		return $users->toJson();
    }
    public function show($id){
    	$id = Users::find($id);
		return $id->toJson();
    }
    public function store(Request $req){
    	$params = $req->json()->all();
    	if (count($params)){
    		$user = new Users;
    		$user->first_name = $params['first_name'];
    		$user->last_name = $params['last_name'];
    		$user->mail = $params['mail'];
    		$user->password = md5($params['password']);
    		$user->save();
    		return $user->toJson();
    	} else {
    		return('{"error": "invalid params"}');
    	}

    }
    public function update($id, Request $req){
    	$user = new Users;
		$user = $user->find($id);
		if ($req->first_name != null){
			$user->first_name = $req->first_name;
		}
		if ($req->last_name != null){
			$user->last_name = $req->last_name;
		}
		if ($req->password != null){
			$user->password = md5($req->password);
		}
		if ($req->mail != null){
			$user->mail = $req->mail;
		}
    	$user->save();
    	return $user->toJson();
    }
    public function destroy($id){
    	$user = Users::find($id);
    	$user->delete();
    	return "Удалено {$id}";

    }
}
