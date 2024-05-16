<?php

namespace App\Http\Controllers;

use App\Models\Giftcode;
use Illuminate\Http\Request;
use App\Models\KTcoin as KTcoinModel;
use App\Models\Dong as DongModel;
use App\Models\MoneyLog as MoneyLogModel;
use App\Models\Giftcode as GiftcodeModel;

class Money extends Controller
{
    public $rate;

    public function __construct()
    {
        $this->rate = env('RATE_NAP', 180);
    }

//    function postNapKTCoin(Request $request){
//        $kvCoin = $request['KVcoin'];
//        $success = KTcoinModel::setKTcoin($kvCoin);
//        if ($success) {
//            return 111111;
//        }
//        else {
//            return 222222222;
//        }
//    }
    function postNapDong(Request $request){
        $kvCoin = $request['KVcoin'];
        $serverId = $request['ServerID'];
        $curentKvCoin = self::getKTcoin();
        if ($curentKvCoin >=$kvCoin) {
//            $addDong = $kvCoin * $this->rate;
//            $currentDong = self::getDong();
//            $newDong = $currentDong+$addDong;
            $newKvCoin = $curentKvCoin-$kvCoin;
            $moneyLog = MoneyLogModel::addToMoneyLogTable($serverId,$curentKvCoin,$kvCoin);
            if ($moneyLog) {
//                DongModel::setDong($newDong);
                $setCoinModel = KTcoinModel::setKTcoin($newKvCoin);
                if ($setCoinModel) {
                    $moneyLog->update(['IsDone' => 1]);
                }
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }
        return redirect('/dashboard')->with('status', $status);
    }

    static function getKTcoin(){
        return KTcoinModel::getKTcoin() ?: 0;
    }

    static function getDong(){
        return DongModel::getDong() ?: 0;
    }

    function postGiftCode(Request $request){
        $data = $request->all();
        $giftCodeObj = new GiftCode();
        $id = $data['ID'];
        $success = $giftCodeObj->createGiftCode($data);
        if ($success) {
            session()->flash('success', 'success');
        } else {
            session()->flash('success', 'error');
        }
        return redirect('editGiftCode/'.$id);
    }

    function editGiftCode($id){
        $giftCodeObj = new GiftCode();
        $giftCodeModel = $giftCodeObj->getGiftCodeById($id);
        echo '<pre>';
        print_r($giftCodeModel);
        echo '<pre>';
        die();
        return view('cms/editGiftCode')->with('id', $id)->with('giftCode', $giftCodeModel);
    }
    function getListBankLog(Request $request){
        $id = $request['id'];
        $serverId = $request['serverid'];
        return MoneyLogModel::getListBankLog($id,$serverId);
    }

    function getGiftCodeRep(Request $request){
        $CodeActive = $request['CodeActive'];
        $RoleID = $request['RoleID'];
        $ServerID = $request['ServerID'];
        return GiftcodeModel::getGiftCodeRep($CodeActive,$RoleID,$ServerID);
    }
}
