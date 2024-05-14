<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class User extends Controller
{
    function postLogin(Request $request){
        $username = $request['LoginName'];
        $email = $request['Email'];
        $password = $request['Password'];
        $userInfo = UserModel::getUserInformation($username,$password,$email);
        if (!$userInfo) {
            session()->flash('wrong_credentials', true);
            return redirect('/login')->with('wrong_credentials', true);
        } else {
            session()->put('user_id', $userInfo->ID);
            session()->put('roleCms', $userInfo->RoleCms);
            return redirect('/dashboard')->with('userInfo', $userInfo);
        }
    }

    function postSignUp(Request $request){
        $username = $request['LoginName'];
        $email = $request['Email'];
        $password = $request['Password'];
        $user = UserModel::getUserInformation($username,$password,$email);
        if (!$user) {
            UserModel::createUser([
                'LoginName' => $username,
                'Email' => $email,
                'Password' => $password,
            ]);
        } else {
            session()->flash('exist', true);
            return redirect('/login')->with('exist', false);
        }
//        $this->sendWelcomeEmail($user);
        // 3. Optional: Send Welcome Email or Perform Other Actions

        // 4. Redirect or Login User (Choose one)
        // Option A: Redirect to Login Page with Success Message
        return redirect('/login')->with('signup_success', true);
    }

    public function sendWelcomeEmail($user){
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

    function getListUser($page){
        $listUser = array();
        $UserModel = new UserModel();
        $listUser = $UserModel->getListUsers($page);
        return view('cms/listUser', ['listUser' => $listUser, 'page' => $page]);
    }

    static function getTotalPage()
    {
        $UserModel = new UserModel();
        return $UserModel->getTotalPage();
    }
}
