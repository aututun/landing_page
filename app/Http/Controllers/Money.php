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

    static function getKTcoin($usernameId = null){
        return KTcoinModel::getKTcoin($usernameId) ?: 0;
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
            if (is_object($success)) {$id = $success->ID;}
        } else {
            session()->flash('success', 'error');
        }
        return redirect('editGiftCode/'.$id);
    }

    function editGiftCode($id){
        $giftCodeObj = new GiftCode();
        if ($id != 0) {
            $giftCodeModel = $giftCodeObj->getGiftCodeById($id);
            return view('cms/editGiftCode')->with('id', $id)->with('giftCode', $giftCodeModel);
        }
        return view('cms/editGiftCode')->with('id', $id);
    }
    function getListBankLog(Request $request){
        list($id,$serverId) = $this->extractIdAndServerIdFromUrl($request->getRequestUri());
        return MoneyLogModel::getListBankLog($id,$serverId);
    }

    private function extractIdAndServerIdFromUrl($url)
    {
        // Parse the URL to extract the query string
        $parts = parse_url($url);

        // Check if query string exists, if not, return default values
        if (!isset($parts['query'])) {
            return [null, null];
        }

        // Parse the query string to get individual parameters
        parse_str($parts['query'], $params);

        // Extract id and serverid
        $id = isset($params['id']) ? $params['id'] : null;
        $serverId = isset($params['serverid']) ? $params['serverid'] : null;

        return [$id, $serverId];
    }

    function getGiftCodeRep(Request $request){
        [$CodeActive,$RoleID,$ServerID,$UserID] = $this->extractIdAndServerIdFromUrl($request->getRequestUri());
        $CodeActive = $request['CodeActive'];
        $RoleID = $request['RoleID'];
        $ServerID = $request['ServerID'];
        $UserID = $request['UserID'];
        GiftcodeModel::insertGiftCodeRep($CodeActive,$RoleID,$ServerID,$UserID);
        return GiftcodeModel::getGiftCodeRep($CodeActive,$RoleID,$ServerID,$UserID);
    }

    private function extractFromUrl($url)
    {
        $parts = parse_url($url);
        if (!isset($parts['query'])) {
            return [null, null,null, null];
        }
        parse_str($parts['query'], $params);
        $CodeActive = isset($params['CodeActive']) ? $params['CodeActive'] : null;
        $RoleID = isset($params['RoleID']) ? $params['RoleID'] : null;
        $ServerID = isset($params['ServerID']) ? $params['ServerID'] : null;
        $UserID = isset($params['UserID']) ? $params['UserID'] : null;

        return [$CodeActive,$RoleID,$ServerID,$UserID];
    }
}
