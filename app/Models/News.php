<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'ID',
        'Catagory',
        'Title',
        'Context',
        'DateTime',
        'LinkPicture',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'NewsTables';
    public $timestamps = false;

    function getListNews(){
        return News::all();
    }

    function getNewsById($id){
        return News::where('ID', $id)->first();
    }

    function getNewsByCategory($category){
        return News::where('Catagory', $category);
    }

    function getListCategory(){
        return News::select('Catagory')->groupBy('Catagory')->get();
    }

    function getUpdateNews($data){
        $id = $data['ID'];
        $newsObj = $this->getNewsById($id);
        $newsObject = array(
            'Catagory' => $data['Category'],
            'Title' => $data['Title'],
            'Context' => $data['Context'],
            'DateTime' => date_format(now(),"Y/m/d H:i:s"),
            'LinkPicture' => $data['LinkPicture'],
        );
        if ($newsObj != 0) {
            return static::where('ID', $id)->update($newsObject);
        } else {
            return static::query()->create($newsObject);
        }
    }

}
