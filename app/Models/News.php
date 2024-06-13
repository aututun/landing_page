<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
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
        return News::all()->where('Deleted', 0);
    }

    function getRandom($limit = 3){
        return News::select()->where('Deleted', 0)->inRandomOrder()->limit($limit)->get();
    }

    function getListNewsMenu($limit = 5){
        return News::all()->where('Deleted', 0)->where('Catagory','!=', 1)->where('PublicNews', 1)->skip(0)->take($limit);
    }

    function getListNewsForSlide(){
        return News::all()->where('Deleted', 0)->where('Catagory',1)->where('PublicNews', 1);
    }

    function getNewsById($id){
        return News::where('ID', $id)->where('Deleted', 0)->where('Catagory','!=', 1)->where('PublicNews', 1)->first();
    }

    function getNewsByIdCms($id){
        return News::where('ID', $id)->where('Deleted', 0)->where('PublicNews', 1)->first();
    }

    function getNewsByCategory($category,$limit = null){
        if (!$limit) {
            return News::where('Catagory', $category)->where('Deleted', 0)->where('Catagory','!=', 1)->where('PublicNews', 1)->orderBy('DateTime', 'DESC')->get();
        }
        return News::where('Catagory', $category)->where('Deleted', 0)->where('Catagory','!=', 1)->where('PublicNews', 1)->skip(0)->take($limit)->orderBy('DateTime', 'DESC')->get();
    }

    function getNewsByFilder($filterPublic,$filterCategory){
        if ($filterCategory === 'all' && $filterCategory === 'all') {
            return News::where('Deleted', 0)->orderBy('DateTime', 'DESC')->get();
        } else if ($filterCategory === 'all') {
            return News::where('Deleted', 0)->where('PublicNews', $filterPublic)->orderBy('DateTime', 'DESC')->get();
        } else if ($filterPublic === 'all') {
            return News::where('Deleted', 0)->where('Catagory', $filterCategory)->orderBy('DateTime', 'DESC')->get();
        }
        return News::where('Catagory', $filterCategory)->where('Deleted', 0)->where('PublicNews', $filterPublic)->orderBy('DateTime', 'DESC')->get();
    }

    function getDeleteNews($id){
        return static::where('ID', $id)->update(array('Deleted' => 1));
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
            'PublicNews' => $data['PublicNews'],
            'Deleted' => 0,
        );
        if ($newsObj) {
            return static::where('ID', $id)->update($newsObject);
        } else {
            return static::query()->create($newsObject);
        }
    }

}
