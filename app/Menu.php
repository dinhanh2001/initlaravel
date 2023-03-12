<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'tblmenus';
    protected $primaryKey = 'menu_id';

    public function getIdAttribute(){
        return $this->attributes['menu_id'];
    }
}
