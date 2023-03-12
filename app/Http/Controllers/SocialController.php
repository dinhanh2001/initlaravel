<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->stateless()->user(), $social);
        if(!$user){
        	return "Error";
        }else{
            if(empty($user->customer_token)){
                $user->customer_token = Customer::generateAPIToken();
                $user->save();
            }
        	Auth::guard('customer')->login($user,true);
        	return redirect()->route('user.index');
        }
    }

    
}
