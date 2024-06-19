<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Category as CategoryModel;
use App\Models\Giftcode as GiftcodeModel;
use App\Models\Server as ServerModel;
use App\Models\Money as MoneyModel;
use App\Models\News as NewsModel;
use App\Models\User as UserModel;
use DateTime;
use HTMLPurifier;
use HTMLPurifier_Config;
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
        return redirect('/');
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
        $categoryModel = new CategoryModel();
        $listCategories = $categoryModel->getListCategories();
        return view('cms/listNews')->with('listNews',$listNews)->with('listCategories',$listCategories);
    }

    public static function getListNewsMenu($limit){
        $newsModel = new NewsModel();
        $listNews = $newsModel->getListNewsMenu($limit);
        return $listNews;
    }

    public static function getListSlide(){
        $newsModel = new NewsModel();
        $listNews = $newsModel->getListNewsForSlide();
        return $listNews;
    }

    function getListNewsByFilter(Request $request){
        $newsModel = new NewsModel();
        $filterPublic = $request['filterPublic'] ?: 'all';
        $filterCategory = $request['filterCategory'] ?: 'all';
        $listNews = $newsModel->getNewsByFilder($filterPublic,$filterCategory);
        $categoryModel = new CategoryModel();
        $listCategories = $categoryModel->getListCategories();
        return view('cms/listNews')->with('listNews',$listNews)->with('listCategories',$listCategories);
    }

    static function getListCategoriesMenu(){
        $categoryModel = new CategoryModel();
        $listCategories = $categoryModel->getListCategories();
        return $listCategories->getDictionary();
    }

    function getDeleteCategory($id){
        $categoryModel = new CategoryModel();
        $result = $categoryModel->getDeleteCategory($id);
        $status = 'error';
        if ($result) $status = 'success';
        session()->flash('statusCategory', $status);
        $listCategories = $categoryModel->getListCategories();
        return view('cms/listCategories')->with('listCategories',$listCategories);
    }

    function getDeleteNews($id){
        $newsModel = new NewsModel();
        $result = $newsModel->getDeleteNews($id);
        $status = 'error';
        if ($result) $status = 'success';
        session()->flash('statusNews', $status);
        $listNews = $newsModel->getListNews();
        return view('cms/listNews')->with('listNews',$listNews);
    }

    function getNewsDetails($id){
        $newsModel = new NewsModel();
        $categoryModel = new CategoryModel();
        $listCategories = $categoryModel->getListCategories()->getDictionary();
        if ($id != 0) {
            $newsObj = $newsModel->getNewsByIdCms($id);
            return view('cms/editNews')->with('id', $id)->with('news', $newsObj)->with('listCategories', $listCategories);
        }
        return view('cms/editNews')->with('id', $id)->with('listCategories', $listCategories);
    }

    function getCategoryDetails($id){
        $newsModel = new CategoryModel();
        if ($id != 0) {
            $categoryObj = $newsModel->getCategoryById($id);
            return view('cms/editCategory')->with('id', $id)->with('category', $categoryObj);
        }
        return view('cms/editCategory')->with('id', $id);
    }

    static function getCategoryById($id){
        $newsModel = new CategoryModel();
        $categoryObj = $newsModel->getCategoryById($id);
        return $categoryObj;
    }

    public static function getCategoryColorClass($categoryId){
        $colorClasses = ['bg-main-1', 'bg-main-2', 'bg-main-3', 'bg-main-4', 'bg-main-5', 'bg-main-6'];
        $colorIndex = ($categoryId - 1) % count($colorClasses);
        return $colorClasses[$colorIndex];
    }

    function getNewsDetailsView($id){
        $newsModel = new NewsModel();
        if ($id != 0) {
            $newsObj = $newsModel->getNewsById($id);
            return view('main/news')->with('id', $id)->with('news', $newsObj);
        }
        return view('main/news')->with('id', $id);
    }

    function getUpdateNewsDetails(Request $request){
        $id = $request['ID'];
        $status = 'false';
        $data = array(
            'ID' => $id,
            'Category' => $request['Category'],
            'Title' => $request['Title'],
            'Context' => $request['Context'],
            'LinkPicture' => $request['LinkPicture'],
            'PublicNews' => $request['PublicNews'],
        );
//        if ($request->hasFile('LinkPicture')) {
//            $directory = "images/" . $request['Category'];
//            if (!File::isDirectory(public_path($directory))) {
//                File::makeDirectory(public_path($directory), 0777, true, true);
//            }
//            // Handle the uploaded file
//            $image = $request->file('LinkPicture');
//            $imageName = $imageName = $image->getClientOriginalName();
//            $image->move(public_path($directory), $imageName);
//            echo '<pre>';
//            print_r($image);
//            echo '<pre>';
//        }
//        die();
        $newsModel = new NewsModel();
        $result = $newsModel->getUpdateNews($data);
        if ($result) {
            $status = 'success';
        }
        session()->flash('status', $status);
        return redirect('/editNews/'.$id);
    }

    function getUpdateCategoryDetails(Request $request){
        $id = $request['ID'];
        $status = 'false';
        $data = array(
            'ID' => $id,
            'CategoryName' => $request['CategoryName'],
        );
        $newsModel = new CategoryModel();
        $result = $newsModel->getUpdateCategory($data);
        if ($result) {
            $status = 'success';
        }
        session()->flash('status', $status);
        return redirect('/editCategory/'.$id);
    }

    function getListCategories(){
        $categoryModel = new CategoryModel();
        $listCategories = $categoryModel->getListCategories()->getDictionary();
        return view('cms/listCategories')->with('listCategories',$listCategories);
    }

    function getListNewsByCategories($id){
        $newsModel = new NewsModel();
        $listNewsByCategories = $newsModel->getNewsByCategory($id)->getDictionary();
        return view('main/categories')->with('listNewsByCategories',$listNewsByCategories);
    }

    static function getListCategoriesAndPostMenu(){
        $categoryModel = new CategoryModel();
        $newsModel = new NewsModel();
        $listCategories = $categoryModel->getListCategories();
        $data = array();
        foreach ($listCategories as $category) {
            $data[$category->ID] = $newsModel->getNewsByCategory($category->ID,3)->getDictionary();
        }
        return $data;
    }

    static function getRandomNews(){
        $newsModel = new NewsModel();
        $data = $newsModel->getRandom(3)->getDictionary();
        return $data;
    }

    static function countDay($dateTime){
        $targetDate = new DateTime($dateTime);
        $formattedTargetDate = $targetDate->format('d-m-Y');
        return $formattedTargetDate;
    }

    public static function getShortenedContext($string, $length = 150, $append = '...'){
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $cleanHtml = $purifier->purify($string);

        // Truncate the clean HTML
        $truncatedString = mb_substr(strip_tags($cleanHtml), 0, $length);

        // Add append if necessary
        if (mb_strlen(strip_tags($cleanHtml)) > $length) {
            $truncatedString .= $append;
        }

        return $truncatedString;
    }
}
