<?php

namespace App\Models;

use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTcoin extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserID',
        'UserName',
        'KCoin',
        'UpdateTime',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'KTCoins';
    public $timestamps = false;
    use HasFactory;

    static public function getUserInformationById($usernameId = null){
        if (!$usernameId) {
            $usernameId = session()->get('user_id');
        }
        $user = KTcoin::where('UserID', $usernameId)->first();
        if ($user) {
            return $user;
        }
        return null;
    }

    static public function getUserInformationByIdFromLogin($usernameId = null){
        if (!$usernameId) {
            $usernameId = session()->get('user_id');
        }
        $user = User::where('ID', $usernameId)->first();
        if ($user) {
            return $user;
        }
        return null;
    }

    static public function setKTcoin($ktCoin,$userId){
        $user = self::getUserInformationById($userId);
        if ($user) {
            return static::query()->where('ID', $user->ID)->update([
                'KCoin' => $ktCoin,
                'UpdateTime' => date_format(now(),"Y/m/d H:i:s"),
            ]);
        } else {
            return self::addKTcoin($ktCoin,$userId);
        }
    }

    static public function addKTcoin($ktCoin,$userId = null){
        if (!$userId) {
            $user = self::getUserInformationByIdFromLogin();
            $userId = $user->ID;
        } else {
            $user = UserModel::getUserInformationById($userId);
        }
        if ($userId) {
            return static::query()->create([
                'UserID' => $userId,
                'UserName' => $user->LoginName,
                'KCoin' => $ktCoin,
                'UpdateTime' => date_format(now(),"Y/m/d H:i:s"),
            ]);
        }
        return null;
    }

    static public function getKTcoin($usernameId = null){
        if (!$usernameId) {
            $usernameId = session()->get('user_id');
        }
        $user = KTcoin::where('UserID', $usernameId)->first();
        if ($user) {
            $KTcoin = $user->KCoin;
            return $KTcoin;
        }
        return 0;
    }

    function isValidData($transaction, $transaction_signature, $checksum_key)
    {
        ksort($transaction);
        $transaction_str_arr = [];
        foreach ($transaction as $key => $value) {
            if (in_array($value, ["undefined", "null"]) || gettype($value) == "NULL") {
                $value = "";
            }

            if (is_array($value)) {
                $valueSortedElementObj = array_map(function ($ele) {
                    ksort($ele);
                    return $ele;
                }, $value);
                $value = json_encode($valueSortedElementObj, JSON_UNESCAPED_UNICODE);
            }
            $transaction_str_arr[] = $key . "=" . $value;
        }
        $transaction_str = implode("&", $transaction_str_arr);
        dump($transaction_str);
        $signature = hash_hmac("sha256", $transaction_str, $checksum_key);
        dump($signature);
        return $signature == $transaction_signature;
    }

}
