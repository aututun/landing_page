<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class User extends Controller
{
    protected $users;
    public function __construct(){
        $this->users = new UserModel();
    }

    function getUserInfo(Request $request){
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        return UserModel::getUserInformation($username,$email,$password);
    }

    function postLogin(Request $request){
        $userInfo = $this->getUserInfo($request);
        if (!$userInfo) {
            session()->flash('wrong_credentials', true);
            return redirect('/login')->with('wrong_credentials', true);
        } else {
            session()->put('user_id', $userInfo->id);
            return redirect('/dashboard')->with('userInfo', $userInfo);
        }
    }

    function postSignUp(Request $request){
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $user = UserModel::getUserInformation($username,$email,$password);
        if (!$user) {
            $user = UserModel::createUser([
                'username' => $username,
                'email' => $email,
                'deleted' => 0,
                'password' => $password,
            ]);
        } else {
            return redirect('/login')->with('exist', false);
        }
        $this->sendWelcomeEmail($user);
        // 3. Optional: Send Welcome Email or Perform Other Actions

        // 4. Redirect or Login User (Choose one)
        // Option A: Redirect to Login Page with Success Message
        return redirect('/login')->with('signup_success', true);
    }

    public function sendWelcomeEmail($user)
    {
        \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\WelcomeEmail($user->username));
    }

    function logout(Request $request){
        session_start();
        if (session()->has('user_id')) {
            session()->forget('user_id');
            return redirect('/');
        }
        return redirect('/dashboard');
    }
}
