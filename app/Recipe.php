<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'tblrecipes';
	
    protected $fillable = [
        'recipes_image','recipes_title', 'recipes_short_title', 'recipes_content','recipes_status','recipes_food_id','recipes_user_id'
    ];
    protected $primaryKey = 'recipes_id';

    public function author(){
        return $this->belongsTo(User::class, 'recipes_user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'comment_recipes_id');
    }

    public function getIdAttribute(){
        return $this->attributes['recipes_id'];
    }

    public function scopeSearchName($query, $str){
        return $query->where('recipes_title', 'LIKE', '%'.$str.'%');
    }

    public function scopeSearchFood($query, $str){
        return $query->where('recipes_food_id', 'LIKE', '%'.$str.'%');
    }
}
