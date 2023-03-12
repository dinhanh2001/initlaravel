<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FullNameRule;

class RegisterRequest extends FormRequest
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
            'customer_name' => ['required',new FullNameRule(),'max:100','min:6'],
            'customer_gender' => 'required|in:1,2',
            'customer_email' => 'required|email|unique:tblcustomers,customer_email',
            'customer_password' => 'required|min:6|max:20|regex:/^[a-zA-Z0-9]+$/',
            're_password' => 'required|same:customer_password',
            'customer_date_of_birth' => 'required|regex:/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4,4}$/'
        ];
    }

    public function attributes()
    {
        return [
            'customer_name' => 'Họ và tên',
            'customer_gender' => 'Giới tính',
            'customer_email' => 'Email',
            'customer_password' => 'Mật khẩu',
            're_password' => 'Mật khẩu xác nhận',
            'customer_date_of_birth' => 'Ngày sinh',
        ];
    }
}
