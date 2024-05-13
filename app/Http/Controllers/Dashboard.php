<?php

namespace App\Http\Controllers;

use App\Models\KTcoin as KTcoinModel;
use App\Models\Dong as DongModel;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function checkLogin(Request $request){
        if (session()->has('user_id')) {
            return view('cms/dashboard',);
        }
        return view('main/login');
    }

    public function getListUser(Request $request){

    }
    public function getKvCoin(Request $request, $userId = null){
    }

    public function getDong(Request $request, $userId = null){
    }
}
