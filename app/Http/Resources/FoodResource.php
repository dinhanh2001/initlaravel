<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FoodResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->food_name,
            'price' => $this->food_price,
            'category' => $this->category->food_category_name,
            'recipes' => $this->hasRecipes() ? route('user.recipe.show',$this->recipes[rand(0,sizeof($this->recipes)-1)]->id) : null
        ];
    }
}
