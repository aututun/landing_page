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

    function getCreateAccountForm(Request $request){
        return view('cms/account');
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
        return redirect('/login')->with('signup_success', true);
    }

    public function postCreateAccount(Request $request){
        $status = 'error';
        $data = array(
            'FullName' => $request['FullName'],
            'LoginName' => $request['LoginName'],
            'Phone' => $request['Phone'] ?: '01234567891',
            'Password' => $request['Password'],
            'Email' => $request['Email'] ?: 'unknow@email.com',
            'RoleCms' => $request['RoleCms'] ?: 0,
        );
        $user = UserModel::getUserRegisterInformation($data['LoginName']);
        if (!$user) {
            UserModel::createUser($data);
            $status = 'success';
        }
        session()->flash('statusCreateAccount', $status);
        return redirect('/createAccount');
    }

    public function postChangePassword(Request $request){
        $oldPassword = $request['oldPassword'];
        $newPassword = $request['newPassword'];
        $reNewPassword = $request['reNewPassword'];
        $user = UserModel::getCurrentUser();
        $currentPass = $user->Password;
        $same_pass = 0;
        $wrong_pass = 0;
        $wrong_retype = 0;
        $status = 'error';
        if ($currentPass != strtoupper(hash('md5', $newPassword, false))) {
            if (strtoupper(hash('md5', $oldPassword, false)) == $user->Password) {
                if ($newPassword == $reNewPassword) {
                    $userModel = new UserModel();
                    $status = $userModel->updatePassword($newPassword);
                    if ($status) {
                        $status = 'success';
                    }
                } else {
                    $wrong_retype = 'wrong_retype';

                }
            } else {
                $wrong_pass = 'wrong_pass';
            }
        } else {
            $same_pass = 'same_pass';
        }
        session()->flash('wrong_retype', $wrong_retype);
        session()->flash('wrong_pass', $wrong_pass);
        session()->flash('same_pass', $same_pass);
        session()->flash('status', $status);
        return redirect('/changePassword');
    }
    public function postChangeInfo(Request $request){
        $status = 'error';
        $userModel = new UserModel();
        $data = $request->all();
        $status = $userModel->updateUser($data);
        if ($status) {
            $status = 'success';
        }
        session()->flash('status', $status);
        return redirect('/account');
    }

    public function postCreateUser(Request $request){
        $status = 'error';
        $userModel = new UserModel();
        $data = $request->all();
        $status = $userModel->updateUser($data);
        if ($status) {
            $status = 'success';
        }
        session()->flash('status', $status);
        return redirect('/account');
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

    function getDetailsUser(){
        $user = UserModel::getCurrentUser();
        return view('cms/account')->with('user', $user);
    }

    static function getTotalPage(){
        $UserModel = new UserModel();
        return $UserModel->getTotalPage();
    }

    function listUserByName(Request $request){
        $loginName = $request['LoginName'];
        $UserModel = new UserModel();
        $listUser = $UserModel->getListUserByName($loginName);
        return view('cms/listUserSearch', ['listUser' => $listUser, 'loginName' => $loginName]);
    }
}
