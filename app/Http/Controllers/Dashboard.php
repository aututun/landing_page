<?php

namespace App\Http\Controllers;
use App\Models\Giftcode as GiftcodeModel;
use App\Models\Server as ServerModel;
use App\Models\Money as MoneyModel;
use App\Models\News as NewsModel;
use App\Models\User as UserModel;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    function __construct(){
        if (!session()->has('user_id')) {
            redirect('/login');
        }
    }

    public function checkLogin(){
        if (session()->has('user_id')) {
            return view('cms/dashboard');
        }
        return view('main/login');
    }

    static function getListServer(){
        $serverModel = new ServerModel;
        $listServer = $serverModel->getListServer();
        return $listServer;
    }

    static function getListMoneyHistory(){
        $userModel = new UserModel();
        $user = $userModel->getCurrentUser();
        $moneyModel = new MoneyModel;
        $listMoneyHistory = $moneyModel->getListMoneyHistory($user->ID);
        return $listMoneyHistory;
    }

    function getServerDetails($serverID){
        $serverModel = new ServerModel;
        $serverDetails = $serverModel->getServerById($serverID);
        $listServer = self::getListServer();
        return view("cms/listServer")->with('listServer',$listServer)->with('serverDetails',$serverDetails);
    }

    public function getFile($location = 'long_kiem'){
        $path = public_path($location);
        $files = scandir($path);
        $filePath = array();
        foreach ($files as $index => $file) {
            if ($file != "." && $file != "..") {
                $filePath[] = $path."/".$file;
            }
        }
        return view('cms/listSql')->with('listFilePath',$filePath);
    }

    static function listGiftCode(){
        $giftCodeModel = new GiftcodeModel();
        $giftCode = $giftCodeModel->getListGiftCode();
        return view('cms/listGiftCode')->with('listGiftCode',$giftCode);
    }

    function getListNews(){
        $newsModel = new NewsModel();
        $listNews = $newsModel->getListNews();
        return view('cms/listNews')->with('listNews',$listNews);
    }

    function getNewsDetails($id){
        $newsModel = new NewsModel();
        if ($id != 0) {
            $newsObj = $newsModel->getNewsById($id);
            return view('cms/editNews')->with('id', $id)->with('news', $newsObj);
        }
        return view('cms/editNews')->with('id', $id);
    }

    function getUpdateNewsDetails(Request $request){
        $id = $request['ID'];
        $data = array(
            'ID' => $id,
            'Category' => $request['Category'],
            'Title' => $request['Title'],
            'Context' => $request['Context'],
            'LinkPicture' => $request['LinkPicture'],
        );
        $newsModel = new NewsModel();
        $newsObj = $newsModel->getUpdateNews($data);
    }
}
