<?php

namespace App\Models;

use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
//        $listMoneyLog = MoneyLog::all();
//        $listMoneyLog = MoneyLog::query()
//            ->where('id', '>',$id)
//            ->where('ServerId', $serverId)
//            ->get();
        $listMoneyLog = DB::select("SELECT * FROM [MoneyLog] WHERE [ServerID] = '".$serverId."' AND [id] > ".$id);
        $newList = array();
        foreach ($listMoneyLog as $moneyLog) {
            $user = UserModel::getUserInformationById($moneyLog->UserID);
            $newEntry  = array(
                'id' => $moneyLog->id,
                'UserName' => $user->LoginName,
                'UserID' => $moneyLog->UserID,
                'ServerID' => $moneyLog->ServerID,
                'Amount' => $moneyLog->KTCoin,
                'Type' => 1,
            );
            $newList[] = $newEntry;
        }
        return $newList;
    }
}
