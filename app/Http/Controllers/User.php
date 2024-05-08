<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    protected $users;
    public function __construct(){
        $this->users = new UserModel();
    }

    function getUserInfo(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        return UserModel::getUserInformation($password,$username);
    }

    function postLogin(Request $request){
        $userInfo = $this->getUserInfo($request);
        return view('cms.dashboard')->with('user_details', $userInfo);
    }

    function postSignUp(Request $request){
        $data = $request->all();
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:6',
//        ]);

        $check = UserModel::createUser($data);
        echo '<pre>';
        print_r($check);
        echo '</pre>';
        exit();
//        return redirect("cms.dashboard")->withSuccess('You have signed-in');
    }

}
