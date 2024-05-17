<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'LoginTables';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'LoginName',
        'Email',
        'Password',
        'RoleCms',
        'Date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'Password',
    ];

    public $timestamps = false;

    protected $primaryKey = 'ID';
    protected $pages;
    protected $itemsPerPage = 20;
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    function getTotalPage()
    {
        $count = User::count();
        $pages = ceil( $count / $this->itemsPerPage );
        return $pages;
    }

    static public function getUserInformation($username,$password,$email = null){
        if ($email) {
            $user = User::where('LoginName', $username)->where('Email', $email)->first();
        } else {
            $user = User::where('LoginName', $username)->first();
        }
        if ($user && strtoupper(hash('md5', $password,false)) == $user->Password) {
            return $user;
        }
        return null;
    }

    static public function getCurrentUser($usernameId = null){
        if (!$usernameId) {
            $usernameId = session()->get('user_id');
        }
        $user = User::where('ID', $usernameId)->first();
        if ($user) {
            return $user;
        }
        return null;
    }

    static public function createUser($data,$isAdmin = false){
        $user = [
            'LoginName' => $data['LoginName'],
            'Email' => $data['Email'],
            'Password' => hash('md5', $data['Password'], false),
            'RoleCms' => 0,
            'Date' => date_format(now(),"Y/m/d H:i:s"),
        ];
        if($isAdmin) {
            $user['RoleCms'] = 1;
        }
        return static::query()->create($user);
    }

    static public function updateUser($data){
        return static::query()->update([
            'Email' => $data['Email'],
            'Password' => Hash::make($data['Password']),
        ]);
    }

    public function getListUsers($page = 0){
        $skip = $page * $this->itemsPerPage;
        $listUsers = User::all()->skip($skip)->take($this->itemsPerPage);
        $newListUsers = array();
        foreach ($listUsers as $user) {
            $user->KTcoin = KTcoin::getKTcoin($user->ID);
            $newListUsers[$user->ID] = $user;
        }
        return $newListUsers;
    }

    static public function getUserInformationById($usernameId = null){
        if (!$usernameId) {
            $usernameId = session()->get('user_id');
        }
        $user = User::where('ID', $usernameId)->first();
        if ($user) {
            return $user;
        }
        return null;
    }

}
