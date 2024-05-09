<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'password',
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

    static public function getUserInformation($username,$password){
        $user = User::where('username', $username)->where('deleted', 0)->first();
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password){
        return password_verify($password, $this->password);
    }

    static public function createUser($data){
        return User::create($id);
    }

    static public function updateUser($data){

    }

    public function getById(int $id): ?User
    {
        return User::find($id);
    }
}
