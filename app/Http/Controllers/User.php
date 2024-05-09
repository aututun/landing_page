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
        return UserModel::getUserInformation($username,$password);
    }

    function postLogin(Request $request){
        $userInfo = $this->getUserInfo($request);
        if (!$userInfo) {
            session()->flash('wrong_credentials', true);
            return redirect('/login')->with('wrong_credentials', true);
        } else {
            session()->put('user_id', $userInfo->id);
            return redirect()->route('dashboard');
        }
    }

    function postSignUp(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users', // Unique email check
            'password' => 'required|string|min:8|confirmed', // Minimum length and confirmation
        ]);

        // 2. Create New User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password for security
        ]);

        // 3. Optional: Send Welcome Email or Perform Other Actions

        // 4. Redirect or Login User (Choose one)
        // Option A: Redirect to Login Page with Success Message
        return redirect('/login')->with('signup_success', true);
    }

}
