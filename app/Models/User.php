<?php

namespace App\Models;


use App\Models\Traits\CanSendQueuedEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable implements MustVerifyEmail 
{
    use HasApiTokens, HasFactory, Notifiable;
    use CanSendQueuedEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return env('SPA_URL').'/login';
        }

    }



    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    static function getRoles(){
        return [
            self::ROLE_USER   =>"user",
            self::ROLE_ADMIN =>"admin",
        ];
    }
    public function getRoleTitleAttribute()
    {
        return self::getRoles()[$this->role];
    }
    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }


    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    static function getGenders(){
        return [
            self::GENDER_MALE   =>"Male",
            self::GENDER_FEMALE =>"Female",
        ];
    }

    public function products(){
        return $this->hasMany(Product::class,'user_id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'user_id');
    }
    public function getGenderTitleAttribute()
    {
        return self::getGenders()[$this->gender];
    }
    /*------------------*/
    protected $fillable = [
        'name',
        'email',
        'password',
    //]+[
        'surname',
        'age',
        'address',
        'gender',
        'role',
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
}
