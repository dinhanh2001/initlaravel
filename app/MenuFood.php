<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuFood extends Model
{
    protected $table = 'tblmenu_foods';
    protected $primaryKey = 'menu_food_id';

    public function getIdAttribute(){
        return $this->attributes['menu_food_id'];
    }
}
