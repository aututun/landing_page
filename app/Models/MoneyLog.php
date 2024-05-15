<?php

namespace App\Models;

use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'UserID',
        'ServerId',
        'KTCoin',
        'KTCoinBefore',
        'KTCoinAfter',
        'AddBy',
        'IsDone',
        'AddedDate',
    ];
    protected $primaryKey = 'id';
    protected $table = 'MoneyLog';
    public $timestamps = false;
    use HasFactory;

    static function addToMoneyLogTable($serverId, $curentKvCoin, $kvCoin)
    {
        $userName = UserModel::getCurrentUser();
        return static::query()->create([
            'UserID' => $userName->ID,
            'ServerId' => $serverId,
            'KTCoin' => $kvCoin,
            'KTCoinBefore' => $curentKvCoin,
            'KTCoinAfter' => $curentKvCoin - $kvCoin,
            'AddBy' => $userName->ID,
            'IsDone' => 0,
            'AddedDate' => date_format(now(), "Y/m/d H:i:s"),
        ]);
    }

    static function getListBankLog($id, $serverId)
    {
        $listMoneyLog = MoneyLog::query()
            ->where('id', '>',$id)
            ->where('ServerId', $serverId)
            ->get();
        $newList = array();
        foreach ($listMoneyLog as $moneyLog) {
            $newList[$moneyLog['id']]['id'] = $moneyLog['id'];
            $newList[$moneyLog['id']]['UserID'] = $moneyLog['UserID'];
            $newList[$moneyLog['id']]['ServerID'] = $moneyLog['ServerID'];
            $newList[$moneyLog['id']]['KTCoin'] = $moneyLog['KTCoin'];
            $newList[$moneyLog['id']]['KTCoinBefore'] = $moneyLog['KTCoinBefore'];
            $newList[$moneyLog['id']]['KTCoinAfter'] = $moneyLog['KTCoinAfter'];
            $newList[$moneyLog['id']]['AddBy'] = $moneyLog['AddBy'];
            $newList[$moneyLog['id']]['IsDone'] = $moneyLog['IsDone'];
            $newList[$moneyLog['id']]['AddedDate'] = $moneyLog['AddedDate'];
        }
        return json_encode($newList);
    }
}
