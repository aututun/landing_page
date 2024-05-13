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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    static public function getUserInformation($username,$password,$email = null){
        if ($email) {
            $user = User::where('LoginName', $username)->where('Email', $email)->first();
        } else {
            $user = User::where('LoginName', $username)->first();
        }
        if ($user && hash('md5', $password,false)) {
            return $user;
        }
        return null;
    }

    static public function createUser($data){
        return static::query()->create([
            'LoginName' => $data['LoginName'],
            'Email' => $data['Email'],
            'Password' => hash('md5', $data['Password'], false),
            'Date' => date_format(now(),"Y/m/d H:i:s"),
        ]);
    }

    static public function updateUser($data){
        return static::query()->update([
            'Email' => $data['Email'],
            'Password' => Hash::make($data['Password']),
        ]);
    }

}
