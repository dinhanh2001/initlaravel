<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = 'tblfood_categories';
    protected $primaryKey = 'food_category_id';

    public function getIdAttribute(){
        return $this->attributes['food_category_id'];
    }
}
