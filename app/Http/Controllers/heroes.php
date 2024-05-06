<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class heroes extends Controller
{
    function getListHeroes(){
        $listHeroes = array(
            array(
                "name" => "Ngũ Độc",
                "image" => "main/images/at1.png",
                "link" => "heroDetails/at1",
            ),
            array(
                "name" => "Nga Mi",
                "image" => "main/images/at2.png",
                "link" => "heroDetails/at2",
            ),
            array(
                "name" => "Đoàn Thị",
                "image" => "main/images/at3.png",
                "link" => "heroDetails/at3",
            ),
            array(
                "name" => "Minh Giáo",
                "image" => "main/images/at4.png",
                "link" => "heroDetails/at4",
            ),
            array(
                "name" => "Võ Đang",
                "image" => "main/images/at5.png",
                "link" => "heroDetails/at5",
            ),
            array(
                "name" => "Thúy Yên",
                "image" => "main/images/at6.png",
                "link" => "heroDetails/at6",
            ),
            array(
                "name" => "Thiếu Lâm",
                "image" => "main/images/at7.png",
                "link" => "heroDetails/at7",
            ),
            array(
                "name" => "Thiên Vương",
                "image" => "main/images/at8.png",
                "link" => "heroDetails/at8",
            ),
            array(
                "name" => "Cái Bang",
                "image" => "main/images/at9.png",
                "link" => "heroDetails/at9",
            ),
            array(
                "name" => "Đường Môn",
                "image" => "main/images/at10.png",
                "link" => "heroDetails/at10",
            ),
            array(
                "name" => "Thiên Nhẫn",
                "image" => "main/images/at11.png",
                "link" => "heroDetails/at11",
            ),
            array(
                "name" => "Côn Lôn",
                "image" => "main/images/at12.png",
                "link" => "heroDetails/at12",
            ),
        );
        return view('main.heroes',["listHeroes"=>$listHeroes]);
    }

    function getDetailHero($id){
        echo '<pre>';
        print_r($id);
        echo '<pre>';
        return;
    }
}
