<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dong extends Model
{
    use HasFactory;

    protected $connection = 'mysql_game';
    protected $fillable = [
        'userid',
        'money',
    ];
    protected $primaryKey = 'userid';
    protected $table = 't_money';
    public $timestamps = false;
    use HasFactory;

    static public function getUserInformationById($usernameId = null){
        if (!$usernameId) {
            $usernameId = session()->get('user_id');
        }
        $user = User::where('ID', $usernameId)->first();
        $userid = $user->ID.'_'.$user->LoginName;
        $userT_money = Dong::where('userid', $userid)->first();
        if ($userT_money) {
            return $userT_money;
        }
        return null;
    }

    static public function setDong($dong){
        $usernameId = session()->get('user_id');
        $user = User::where('ID', $usernameId)->first();
        $userid = $user->ID.'_'.$user->LoginName;
        if ($user) {
            return static::query()->where('userid', $userid)->update([
                'money' => $dong,
            ]);
        }
        return null;
    }

    static public function getDong(){
        $usernameId = session()->get('user_id');
        $user = User::where('ID', $usernameId)->first();
        $userid = $usernameId.'_'.$user->LoginName;
        $userT_money = Dong::where('userid', $userid)->first();
        if ($userT_money) {
            $dong = $userT_money->money;
            return $dong;
        }
        return 0;
    }
}
