<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class Giftcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'ServerID',
        'Code',
        'Status',
        'ItemList',
        'TimeCreate',
        'MaxActive',
        'UserName',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'GiftCodes';
    public $timestamps = false;
    use HasFactory;

    function createGiftCode($data){
        $id = $data['ID'];
        $userName = UserModel::getCurrentUser();
        $giftCodeObj = [
            'ServerID' => $data['ServerID'],
            'Code' => $data['Code'],
            'Status' => $data['Status'],
            'ItemList' => $data['ItemList'],
            'TimeCreate' => date_format(now(),"Y/m/d H:i:s"),
            'MaxActive' => $data['MaxActive'],
            'UserName' => $userName->LoginName,
        ];
        if ($id != 0) {
            // Update
            return static::where('ID', $id)->update($giftCodeObj);
        } else {
            // Create
            return static::query()->create($giftCodeObj);
        }

    }

    function getListGiftCode(){
        return Giftcode::all();
    }

    function getGiftCodeById($id){
        return Giftcode::where('ID', $id)->first();
    }

    function insertGiftCodeRep($CodeActive,$RoleID,$ServerID){

    }

    function getGiftCodeRep($CodeActive,$RoleID,$ServerID){
        $query = "SELECT GiftCodes.Status, GiftCodes.ItemList, GiftCodes.ServerID, GiftCodes.ActiveRole
                    FROM GiftCodes INNER JOIN GiftCodeLogs
                    ON GiftCodes.ServerID = GiftCodeLogs.ServerID
                    AND GiftCodes.Code = GiftCodeLogs.Code
                    WHERE GiftCodes.Code = '".$CodeActive."'
                    AND GiftCodes.ActiveRole = ".$RoleID."
                    AND GiftCodes.ServerID = ".$ServerID;
        $listGiftCodeLog = DB::select($query);
        foreach ($listGiftCodeLog as $giftCodeLog) {}
        $userId = $giftCodeLog->UserIdGetCode;
        $userModel = UserModel::getUserInformationById($userId);
        $newEntity = array(
            'Status' => $giftCodeLog->Status,
            'ItemList' => $giftCodeLog->ItemList,
            'ServerID' => $giftCodeLog->ServerID,
            'UserIdGetCode' => $userModel->LoginName,
        );
        return $newEntity;
    }
}
