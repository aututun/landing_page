<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as UserModel;

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
            $giftCodeObj['ID'] = $id;
            return static::query()->update($giftCodeObj);
        } else {
            // Create
            return static::query()->create($giftCodeObj);
        }

    }
}
