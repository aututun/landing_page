<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'CategoryName',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'Category';
    public $timestamps = false;

    function getListCategories(){
        return Category::all()->where('Deleted', 0)->where('ID','!=', 1);
    }

    function getCategoryById($id){
        return Category::where('ID', $id)->where('Deleted', 0)->first();
    }

    function getDeleteCategory($id){
        return static::where('ID', $id)->update(array('Deleted' => 1));
    }

    function getUpdateCategory($data){
        $id = $data['ID'];
        $categoryObj = $this->getCategoryById($id);
        $categoryObject = array(
            'CategoryName' => $data['CategoryName'],
            'Deleted' => 0,
        );
        if ($categoryObj) {
            return static::where('ID', $id)->update($categoryObject);
        } else {
            return static::query()->create($categoryObject);
        }
    }
}
