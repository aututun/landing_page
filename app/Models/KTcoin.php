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

}
