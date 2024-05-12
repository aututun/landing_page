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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'deleted',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static public function getUserInformation($username,$email,$password){
        $user = User::where('username', $username)->where('email', $email)->where('deleted', 0)->first();
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
        return null;
    }

    static public function createUser($data){
        return static::query()->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'deleted' =>   0,
            'password' => Hash::make($data['password']),
        ]);
    }

    static public function updateUser($data){
        return static::query()->update([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    static public function deleteUser(){
        return static::query()->update([
            'deleted' => 1,
        ]);
    }
}
