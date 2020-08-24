<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value){
        return asset($value ?: 'storage/avatars/s8nVarkU6CAxuXGVujQvPgoJK2AjJRuMawiAnFB4.jpeg');
    }

    //While updating the password

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


    public function timeline(){
        //return Tweet::where('user_id',$this->id)->latest()->get();
        //$ids = $this->follows->pluck('id');
        //if we use follows-> then we are hitting all the collection
        $friends = $this->follows()->pluck('id');
        //if we are hitting follows()
        //then we are hitting only id's
        return Tweet::whereIn('user_id',$friends)
                    ->orWhere('user_id',$this->id)
                    ->withLikes()
                    ->latest()
                    ->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function path($append = ''){
        $path =  route('profile',$this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

}
