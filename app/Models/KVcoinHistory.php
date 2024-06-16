<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return KVcoinHistory::all()->where('ToUser', $id);
    }

    function getHistoryKTcoin($fromUserID,$toUserID){
        return KVcoinHistory::all()->where('fromUserID', $fromUserID)->where('ToUser', $toUserID);
    }

    public static function createHistory($fromUserID,$toUserID,$KVcoin,$method){
        $obj = array(
            'fromUser' => $fromUserID,
            'toUser' => $toUserID,
            'KVcoin' => $KVcoin,
            'Date' => date_format(now(),"Y/m/d H:i:s"),
            'Method' => $method,
        );
        return static::query()->create($obj);
    }
}
