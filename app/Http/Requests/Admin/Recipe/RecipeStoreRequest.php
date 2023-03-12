<?php

namespace App\Http\Requests\Admin\Recipe;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FullNameRule;

class RecipeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipes_title' => ['required',new FullNameRule(),'max:150','min:6'],
            'recipes_short_title' => ['required','max:250','min:6'],
            'recipes_content' => 'required|min:6',
            'recipes_food_id' => 'required|exists:tblfoods,food_id',
            'recipes_user_id' => 'required|exists:tblusers,user_id'
        ];
    }
    public function attributes()
    {
        return [
            'recipes_title' => 'Tiêu đề',
            'recipes_short_title' => 'Mô tả ngắn',
            'recipes_content' => 'Nội dung',
            'recipes_food_id' => 'Loại thực phẩm',
        ];
    }
}
