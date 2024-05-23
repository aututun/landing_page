<?php

namespace App\Models;

use App\Models\Server as ServerModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserID',
        'ServerID',
        'KTCoin',
        'AddedDate',
    ];
    protected $primaryKey = 'id';
    protected $table = 'MoneyLog';
    public $timestamps = false;

    function getListMoneyHistory($userId){
        $listMoneyHistory = Money::all()->where('UserID', $userId)->where('KTCoin','>' ,0);
        $newListMoneyHistory = array();
        foreach ($listMoneyHistory as $historyLog) {
            $serverModel = ServerModel::getServerById($historyLog->ServerID);
            $historyLog->ServerName = $serverModel->strServerName;
            $newListMoneyHistory[$historyLog->id] = $historyLog;
        }
        return $newListMoneyHistory;
    }
}
