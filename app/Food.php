<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'food_name','food_energy', 'food_protein', 'food_lipid','food_glucid','food_price','food_status','food_food_category_id'
    ];
    protected $table = 'tblfoods';
	protected $primaryKey = 'food_id';

    public function getIdAttribute(){
        return $this->attributes['food_id'];
    }

    public function scopeSearchName($query, $str){
        return $query->where('food_name', 'LIKE', '%'.$str.'%');
    }

    public function scopeSearchCategory($query, $str){
        return $query->where('food_food_category_id', $str);
    }

    public function category(){
        return $this->belongsTo(FoodCategory::class, 'food_food_category_id');
    }

    public function recipes(){
        return $this->hasMany(Recipe::class, 'recipes_food_id');
    }
        
    public function hasRecipes(){
        $lstRecipes = $this->recipes;
        if(sizeof($lstRecipes) > 0){
            return true;
        }
        return false;
    }
}
