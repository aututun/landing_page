<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as UserModel;

class KVcoinHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'FromUser',
        'ToUser',
        'KVcoin',
        'Method',
        'Date',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'KVcoinHistory';
    public $timestamps = false;

    function getHistoryKTcoinByCurrentUser(){
        $currentUserID = session()->get('user_id');
        return KVcoinHistory::getHistoryKTcoinByUserFrom($currentUserID);
    }

    function getHistoryKTcoinByUserFrom($id){
        return KVcoinHistory::all()->where('FromUser', $id);
    }

    function getHistoryKTcoinByUserTo($id){
        $data = KVcoinHistory::all()->where('ToUser', $id);
        $newData = array();
        foreach ($data as $key => $value) {
            $fromUserId = $value->FromUser;
            if ($fromUserId == 0) {
                $value->FromUser = 'Auto';
            } else {
                $userModel = UserModel::getUserInformationById($fromUserId);
                $value->FromUser = $userModel ? $userModel->LoginName : 'Auto';
            }
            $newData[$key] = $value;
        }
        return $newData;
    }

    function getHistoryKTcoin($fromUserID,$toUserID){
        return KVcoinHistory::all()->where('fromUserID', $fromUserID)->where('ToUser', $toUserID);
    }

    public static function createHistory($fromUserID,$toUserID,$KVcoin,$method){
        $obj = array(
            'FromUser' => $fromUserID,
            'ToUser' => $toUserID,
            'KVcoin' => $KVcoin,
            'Date' => date_format(now(),"Y/m/d H:i:s"),
            'Method' => $method,
        );
        static::query()->create($obj);
    }
}
