<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'tblcustomers';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'customer_name','customer_gender', 'customer_email', 'customer_password','customer_photo_address','customer_address','customer_job','customer_date_of_birth','customer_status','customer_height','customer_target','customer_weight','customer_present','customer_active','customer_disease_id'
    ];

    public function setCustomerPasswordAttribute($value){
        $this->attributes['customer_password'] = bcrypt($value);
    }

    public function hasProfile(){
        $flag = true;
        if($this->customer_height == null){
            $flag = false;
        }
        if($this->customer_weight == null){
            $flag = false;
        }
        if($this->customer_present == null){
            $flag = false;
        } 
        if($this->customer_active == null){
            $flag = false;
        } 
        if($this->customer_active == null){
            $flag = false;
        } 
        return $flag;
    }

    public function getAge(){
        $birthDate = date_create_from_format('d/m/Y', $this->customer_date_of_birth)->format('m/d/Y');;
        $birthDate = explode("/", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
        return $age;
    }

    public function getAuthPassword()
    {
        return $this->customer_password;
    }

    public function getIdAttribute(){
        return $this->attributes['customer_id'];
    }

    public static function generateAPIToken(){
        return str_random(60);
    }
}
