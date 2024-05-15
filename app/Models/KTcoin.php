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

    static public function setKTcoin($ktCoin){
        $user = self::getUserInformationById();
        if ($user) {
            return static::query()->where('ID', $user->ID)->update([
                'KCoin' => $ktCoin,
                'UpdateTime' => date_format(now(),"Y/m/d H:i:s"),
            ]);
        } else {
            return self::addKTcoin($ktCoin);
        }
    }

    static public function addKTcoin($ktCoin){
        $user = self::getUserInformationByIdFromLogin();
        if ($user) {
            return static::query()->create([
                'UserID' => $user->ID,
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
