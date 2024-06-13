<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use stdClass;

class Giftcode extends Model
{
    static public $Msg;
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
            'UserName' => $data['UserName'],
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
        return Giftcode::all()->where('Deleted', 0);
    }

    function getGiftCodeById($id){
        return Giftcode::where('ID', $id)->first();
    }

    function updateGiftCode($id){
        return static::query()->where('ID', $id)->update([
            'Deleted' => 1,
        ]);
    }

    static function insertGiftCodeRep($CodeActive,$RoleID,$ServerID,$UserId){
        $queryFindGiftCodeMax = "SELECT TOP 1 * FROM [GiftCodes] WHERE [Code] = '".$CodeActive."' AND [ServerID] = ".$ServerID;
        $queryFindGiftCodeMaxResult = DB::select($queryFindGiftCodeMax);
        $queryFindGiftCodeMax2 = "SELECT TOP 1 * FROM [GiftCodeLogs] WHERE [Code] = '".$CodeActive."' AND [ServerID] = ".$ServerID;
        $queryFindGiftCodeMaxResult2 = DB::select($queryFindGiftCodeMax2);

        // Case hết lượt sử dụng
        $queryFindtGiftCode = "SELECT * FROM [GiftCodeLogs] WHERE [Code] = ? AND [ServerID] = ?";
        $queryFindGiftCodeResult = DB::select($queryFindtGiftCode, [$CodeActive, $ServerID]);

        // Case đã dùng code này
        $queryFindtGiftCodeExist = "SELECT TOP 1 * FROM [GiftCodeLogs] WHERE [Code] = '".$CodeActive."' AND [ServerID] = ".$ServerID." AND [UserIdGetCode] = ".$UserId;
        $queryFindGiftCodeExistResult = DB::select($queryFindtGiftCodeExist);

        if ((!$queryFindGiftCodeMaxResult && $queryFindGiftCodeMaxResult2)) {
            Return array('Code không hợp lệ',-1);
        }
        $maxActive = '';
        if ($queryFindGiftCodeMaxResult) {
            $code = false;
            if ($queryFindGiftCodeMaxResult[0]->UserName) {
                $userNameList = explode('|',$queryFindGiftCodeMaxResult[0]->UserName);
                $userGetCodeModel = UserModel::getUserInformationById($UserId);
                foreach ($userNameList as $userName) {
                    if ($userGetCodeModel->LoginName == $userName) {
                        $code = true;
                        break;
                    }
                }
                if (!$code) {
                    Return array('Bạn không có quyền nhập code này',-5);
                }
            }
            $maxActive = $queryFindGiftCodeMaxResult[0]->MaxActive;
            $isActive = $queryFindGiftCodeMaxResult[0]->Status;
            if ($isActive == 0) {
                Return array('Code đã hết hạn sử dụng',-2);
            }
            if (count($queryFindGiftCodeResult) >= $maxActive) {
                Return array('Code hết lượt sử dụng',-3);
            }
        }
        if (count($queryFindGiftCodeExistResult) >= 1) {
            Return array('Bạn đã nhập code này',-4);
        }
        $queryInsertGiftCode = "INSERT INTO [GiftCodeLogs] ([Code], [ActiveRole], [ServerID], [UserIdGetCode]) VALUES (?,?,?,?)";
        $result = DB::insert($queryInsertGiftCode,[$CodeActive,$RoleID,$ServerID,$UserId]);
        if ($result) {
            $queryFindtGiftCodeAg = "SELECT * FROM [GiftCodeLogs] WHERE [Code] = ? AND [ServerID] = ?";
            $queryFindGiftCodeResultAg = DB::select($queryFindtGiftCodeAg, [$CodeActive, $ServerID]);
            if (!$maxActive) {
                $queryFindGiftCodeMax = "SELECT TOP 1 * FROM [GiftCodes] WHERE [Code] = '".$CodeActive."' AND [ServerID] = ".$ServerID;
                $queryFindGiftCodeMaxResult = DB::select($queryFindGiftCodeMax);
                $maxActive = $queryFindGiftCodeMaxResult[0]->MaxActive;
            }
            if (count($queryFindGiftCodeResultAg) >= $maxActive) {
                $queryUpdateMaxActive = "UPDATE [GiftCodes] SET [Status] = 1 WHERE [Code] = ? AND [ServerID] = ?";
                DB::update($queryUpdateMaxActive, [$CodeActive, $ServerID]);
            }
            Return array('Nhập Code thành công',1);
        } else {
            Return array('Code không hợp lệ',-1);
        }
    }

    static function getGiftCodeRep($CodeActive,$RoleID,$ServerID,$UserId){
        list($Msg,$status) = self::insertGiftCodeRep($CodeActive,$RoleID,$ServerID,$UserId);
        $query = "SELECT GiftCodes.Status, GiftCodes.ItemList, GiftCodes.ServerID, GiftCodeLogs.UserIdGetCode, GiftCodeLogs.ActiveRole
          FROM GiftCodes INNER JOIN GiftCodeLogs
          ON GiftCodes.ServerID = GiftCodeLogs.ServerID
          AND GiftCodes.Code = GiftCodeLogs.Code
          WHERE GiftCodes.Code = ?
          AND GiftCodeLogs.ActiveRole = ?
          AND GiftCodes.ServerID = ?
          AND GiftCodeLogs.UserIdGetCode = ?";
        $listGiftCodeLog = DB::select($query, [$CodeActive, $RoleID, $ServerID, $UserId]);
        $data = '';
        if ($listGiftCodeLog) {
            foreach ($listGiftCodeLog as $giftCodeLog) {
                $userId = $giftCodeLog->UserIdGetCode;
                $userModel = UserModel::getUserInformationById($userId);
                $newEntity =  new StdClass();
                $newEntity->Status = $status;
                $newEntity->Msg = $Msg;
                $newEntity->GiftItem = $giftCodeLog->ItemList;
                $newEntity->UserName = $userModel->LoginName;
                $data = $newEntity;
            }
        } else {
            $userModel = UserModel::getUserInformationById($UserId);
            $data = new StdClass();
            $data->Status = $status;
            $data->Msg = $Msg;
            $data->GiftItem = "";
            $data->UserName = $userModel ? $userModel->LoginName : 'Không tồn tại user';
        }
        return $data;
    }
}
