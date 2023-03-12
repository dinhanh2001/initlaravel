<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\ChangePasswordRequest;
use App\Http\Requests\Customer\RegisterRequest;
use App\Recipe;
use App\Customer;
use App\Food;
use Auth;
use Hash;
use Response;

class HomeController extends Controller
{
      public function uploadTemp(Request $request){
         if($request->hasFile('avatar')){
            return 1;
         }
         return 0;
      }
      public function getLogin(Request $request){
         $register = 0;
         if(isset($request->register)){
            $register = 1;
         }
         return view('user.login',compact('register'));
      }

      public function postLogin(LoginRequest $request){
         $remember = 0;
         if (!empty($request->remember)) {
            $remember = 1;
         }
         $email = $request->email;
         $password = $request->password;
         if(Auth::guard('customer')->attempt(['customer_email' => $email, 'password' => $password],$remember)){
             $customer = Auth::guard('customer')->user();
             if(empty($customer->customer_token)){
                 $customer->customer_token = Customer::generateAPIToken();
                 $customer->save();
             }
             return redirect()->route('user.index');
         } else {
            session()->flash('error','Tài khoản hoặc mật khẩu không chính xác');
            $request->flash();
            return back();
         }
      }

      public function postRegister(RegisterRequest $request){
         $customer = Customer::create($request->all());
         $customer->customer_token = Customer::generateAPIToken();
         $customer->save();
         return Response::json([
            'data' => 'Tạo tài khoản thành công',
            'error' => null
         ], 200);
      }

      public function postChangePassword(ChangePasswordRequest $request){
        if (Hash::check($request->old_password, Auth::guard('customer')->user()->customer_password)) {
            $user = Auth::guard('customer')->user();
            $user->customer_password = $request->password;
            $user->save();
            session()->flash('success', 'Đổi mật khẩu thành công');
            Auth::logout();
            return redirect()->route('user.profile');
        } else {
            session()->flash('error', 'Đổi mật khẩu không thành công');
            return back();
        }
      }

      public function getLogout(){
         Auth::guard('customer')->logout();
         return redirect()->route('user.index');
      }
      
   	public function index(){
         $recipess = Recipe::orderBy('created_at', 'desc')->where('recipes_status',1)->limit(8)->get();
         $commons = Recipe::limit(4)->get();
   		return view('user.index',compact('recipess','commons'));
   	}

   	public function menu(){
         $lstFood = Food::all()->random(5);
         if(!Auth::guard('customer')->user()->hasProfile()){
            return redirect()->route('user.profile')->with('error','Vui lòng cập nhật thông tin cá nhân');
         }
   		return view('user.menu',compact('lstFood'));
   	}

   	public function recipe(){
         $recipess = Recipe::latest()->paginate(9);
   		return view('user.recipe.index',compact('recipess'));
   	}

   	public function recipeShow($id){
         $commons = Recipe::limit(4)->get();
         $recipes = Recipe::findOrFail($id);
   		return view('user.recipe.show',compact('commons','recipes'));
   	}

   	public function profile(){
         $user = Auth::guard('customer')->user();
   		return view('user.profile',compact('user'));
   	}

      public function updateProfile(Request $request){
         $user = Auth::guard('customer')->user();
         $user->update($request->all());
         if($request->hasFile('customer_images'))
         {
            $file = $request->customer_images;
            $path = $user->customer_photo_address;
            if(empty($path)){
                $path = 'customer' . time() . '.' . $file->getClientOriginalExtension();
            }
            $image = $file->move('customer_images',$path);
            $image = $image->getPathname();
            $user->customer_photo_address = $image;
            $user->save();
         }
         return redirect()->route('user.profile');
      }
}
