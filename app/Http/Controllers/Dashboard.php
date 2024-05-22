<?php

namespace App\Http\Controllers;
use App\Models\Giftcode as GiftcodeModel;
use App\Models\Server as ServerModel;
use App\Models\Money as MoneyModel;

use App\Models\User as UserModel;
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

    static function getListMoneyHistory(){
        $userModel = new UserModel();
        $user = $userModel->getCurrentUser();
        $moneyModel = new MoneyModel;
        $listMoneyHistory = $moneyModel->getListMoneyHistory($user->ID);
        return $listMoneyHistory;
    }



    static function listGiftCode(){
        $giftCodeModel = new GiftcodeModel();
        $giftCode = $giftCodeModel->getListGiftCode();
        return view('cms/listGiftCode')->with('listGiftCode',$giftCode);
    }
}
