<?php

namespace App\Http\Controllers;

use App\Models\Giftcode;
use Illuminate\Http\Request;
use App\Models\KTcoin as KTcoinModel;
use App\Models\Dong as DongModel;
use App\Models\User as UserModel;
use App\Models\MoneyLog as MoneyLogModel;
use App\Models\Giftcode as GiftcodeModel;

class Money extends Controller
{
    public $rate;

    public function __construct()
    {
        $this->rate = env('RATE_NAP', 180);
    }

    function congKTcoin(Request $request){
        $status = 'error';
        $kvCoin = $request['KVcoin'];
        $userId = $request['userDuocNap'];
        $currentLoginUserRole = session()->get('roleCms');
        $currentLoginUserID = session()->get('user_id');
        if ($currentLoginUserRole == 2) {
            $currentLoginKTcoin = KTcoinModel::getKTcoin($currentLoginUserID);
            $newLoginKTcoin = $currentLoginKTcoin - $kvCoin;
            KTcoinModel::setKTcoin($newLoginKTcoin,$currentLoginUserID);
        }
        $curentKTcoin = KTcoinModel::getKTcoin($userId);
        $newKTcoin = $curentKTcoin + $kvCoin;
        $result = KTcoinModel::setKTcoin($newKTcoin,$userId);
        if ($result) {
            $status = 'success';
        }
        session()->flash('status', $status);
        return redirect('/listUser/1');
    }

    function truKTcoin(Request $request){
        $kvCoin = $request['KVcoin'];
        $userId = $request['userDuocNap'];
        $curentKTcoin = KTcoinModel::getKTcoin($userId);
        $status = 'error';
        if ($curentKTcoin < $kvCoin) {
            $newKTcoin = 0;
        } else {
            $newKTcoin = $curentKTcoin - $kvCoin;
        }
        $result = KTcoinModel::setKTcoin($newKTcoin,$userId);
        if ($result) {
            $status = 'success';
        }
        session()->flash('status', $status);
        return redirect('/listUser/1');
    }
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
                $setCoinModel = KTcoinModel::setKTcoin($newKvCoin,null);
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

    function deleteGiftCode($id){
        $giftCodeObj = new GiftCode();
        $status = 'error';
        if ($id != 0) {
            $giftCodeModel = $giftCodeObj->updateGiftCode($id);
            if ($giftCodeModel) $status = 'success';
        }
        session()->flash('statusGiftCode', $status);
        return redirect('/listGiftCode');
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
        [$CodeActive,$RoleID] = $this->extractCodeActiveAndRoleIDFromUrl($request->getRequestUri());
        [$ServerID,$UserID] = $this->extractServerIDAndUserIDFromUrl($request->getRequestUri());
        $giftCode =  GiftcodeModel::getGiftCodeRep($CodeActive,$RoleID,$ServerID,$UserID);
        return $giftCode;
    }

    private function extractCodeActiveAndRoleIDFromUrl($url)
    {
        $parts = parse_url($url);
        if (!isset($parts['query'])) {
            return [null, null];
        }
        parse_str($parts['query'], $params);
        $CodeActive = isset($params['CodeActive']) ? $params['CodeActive'] : null;
        $RoleID = isset($params['RoleID']) ? $params['RoleID'] : null;

        return [$CodeActive,$RoleID];
    }

    private function extractServerIDAndUserIDFromUrl($url)
    {
        $parts = parse_url($url);
        if (!isset($parts['query'])) {
            return [null, null];
        }
        parse_str($parts['query'], $params);
        $ServerID = isset($params['ServerID']) ? $params['ServerID'] : null;
        $UserID = isset($params['UserID']) ? $params['UserID'] : null;

        return [$ServerID,$UserID];
    }

    function createUrl(Request $request){
        $url = 'http://103.200.20.220:3000/create';
        $KVCoin = $request['KVcoin'];
        $userName = UserModel::getCurrentUser();
        $userId = $userName->ID;
        $LoginName = $userName->LoginName;
        $data = array(
            'userId' => $userId,
            'createUser' => $LoginName,
            'price' => $KVCoin,
            'itemName' => 'KVCoin'
        );
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1); // Set method to POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the content type to JSON
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Attach the JSON-encoded data
        $response = curl_exec($ch);
//        $response = 'https://pay.payos.vn/web/26fae30b96934f04918c12a74de7744c/';
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            return $response;
        }
        curl_close($ch);
    }

    public function cancelBuy(Request $request){
        echo $request;
    }
}
