<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroes as HeroesModel;

class Heroes extends Controller
{
    public $listHeroes;
    function __construct(){
        $this->listHeroes = HeroesModel::getListHeroes();
    }
    function getListHeroes(){
        $listHeroes = $this->listHeroes;
        return view('main.heroes',["listHeroes"=>$listHeroes]);
    }

    function getDetailHero($id){
        $listHeroes = $this->listHeroes;
        $return = array();
        foreach ($listHeroes as $hero){
            if($id == $hero["name"]){
                $return = $hero;
            }
        }
        return view('main.heroDetails',["hero"=>$return]);
    }
}
