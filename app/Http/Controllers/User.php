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
        $action = $request['action'];
        $username = $request['username'];
        $password = $request['password'];
        $token = $request['token'];
        $userid = $request['id'];
        $userInfo = $this->users->getUserInformation($userid);
        return view('cms.users')->with('user_details', $userInfo);
    }

    function postLogin(Request $request){
        $action = $request['action'];
        $username = $request['username'];
        $password = $request['password'];
        $token = $request['token'];
        $userid = $request['id'];
        $userInfo = $this->users->getUserInformation($userid);
        return view('cms.dashboard')->with('user_details', $userInfo);
    }

    function postSignUp(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return UserModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
