<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShouldNotFood extends Model
{
    protected $table = 'tblshould_not_foods';
    protected $primaryKey = 'should_not_food_id';

    public function getIdAttribute(){
        return $this->attributes['should_not_food_id'];
    }
}
