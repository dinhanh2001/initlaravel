<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Food;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Recipe\RecipeStoreRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipes = (new Recipe)->newQuery();
        if($request->name){
            $recipes = $recipes->SearchName($request->name);
        }
        if($request->food){
            $recipes = $recipes->SearchFood($request->food);
        }
        $foods = Food::all();
        $recipes = $recipes->latest()->paginate(5);
        return view('admin.recipe.index',compact('recipes','foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foods = Food::all();
        return view('admin.recipe.create',compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeStoreRequest $request)
    {
        $image = '';
        if($request->hasFile('recipes_image'))
        {
            $file = $request->recipes_image;
            $image = $file->move('recipe_images', 'recipe' . time() . "." . $file->getClientOriginalExtension());
            $image = $image->getPathname();
        }
        $data = ['recipes_image' => $image];

        $data = array_merge($request->only([
                'recipes_title', 'recipes_short_title', 'recipes_content', 'recipes_status', 'recipes_food_id', 'recipes_user_id'
        ]), (array) $data);

        $recipe = Recipe::create($data);

        session()->flash('message','Thêm công thức thành công');
        return redirect()->route('admin.recipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('admin.recipe.show',compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $foods = Food::all();
        return view('admin.recipe.edit',compact('recipe','foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $image = !empty($recipe->recipes_image) ? $recipe->recipes_image : "";
        if($request->hasFile('recipes_image'))
        {
            $file = $request->recipes_image;
            $fileName = 'recipe' . time() . "." . $file->getClientOriginalExtension();
            if(!empty($recipe->recipes_image)){
                $fileName = $recipe->recipes_image;
            }
            $image = $file->move('recipe_images', $fileName);
            $image = $image->getPathname();
        }
        $data = ['recipes_image' => $image];

        $data = array_merge($request->only([
                'recipes_title', 'recipes_short_title', 'recipes_content', 'recipes_status', 'recipes_food_id', 'recipes_user_id'
        ]), (array) $data);

        $recipe->update($data);
        session()->flash('message','Sửa công thức thành công');
        return redirect()->route('admin.recipe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        session()->flash('message','Xóa một người dùng thành công');
        return redirect()->route('admin.recipe.index');
    }

    public function deleteMany(Request $request){
        $ckboxs = $request->ckb;
        if(is_array($ckboxs)){
            foreach ($ckboxs as $key => $value) {
                $recipe = Recipe::findOrFail($value);
                $recipe->delete();
            }
            session()->flash('message','Xóa công thức thành công');
            return redirect()->route('admin.recipe.index');
        }else{
            return back();
        }
    }
}
