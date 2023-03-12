<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShouldFood extends Model
{
    protected $table = 'tblshould_foods';
    protected $primaryKey = 'should_food_id';

    public function getIdAttribute(){
        return $this->attributes['should_food_id'];
    }
}
