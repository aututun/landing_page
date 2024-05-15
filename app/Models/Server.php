<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $table = 'ServerListsIos';
    protected $fillable = [
        'strServerName',
    ];
    public $timestamps = false;
    protected $primaryKey = 'ID';

    public function getListServer(){
        return Server::all();
    }
}
