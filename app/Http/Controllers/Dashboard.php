<?php

namespace App\Http\Controllers;
use App\Models\Server as ServerModel;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function checkLogin(Request $request){
        if (session()->has('user_id')) {
            return view('cms/dashboard',);
        }
        return view('main/login');
    }

    static function getListServer(){
        $serverModel = new ServerModel;
        $listServer = $serverModel->getListServer();
        return $listServer;
    }
}
