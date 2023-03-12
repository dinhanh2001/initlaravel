<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tblusers';
    
    protected $fillable = [
        'user_name','user_gender', 'user_email', 'user_password','user_photo_address','user_job','user_date_of_birth','user_status','user_permission_id'
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function scopeSearchName($query, $str){
        return $query->where('user_name', 'LIKE', '%'.$str.'%');
    }

    public function isAdmin(){
        return $this->user_permission_id == 1;
    }

    public function questions(){
        return $this->hasMany(Question::class, 'question_user_id');
    }

    public function getIdAttribute(){
        return $this->attributes['user_id'];
    }
}
