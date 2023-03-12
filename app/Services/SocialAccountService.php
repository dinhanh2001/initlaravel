<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Customer;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $user = (array) $providerUser;
        if(empty($user['email'])){
            return null;
        }
        $account = Customer::where('customer_email',$user['email'])->first();
        if ($account) {
            return $account;
        } else {
            $account = new Customer;
            $account->customer_uid = $user['id'];
            $account->customer_name = $user["name"];
            $account->customer_email = $user['email'];
            $account->customer_password = '123456';
            $account->customer_token_app = $user["token"];
            $account->customer_token = Customer::generateAPIToken();
            $account->customer_photo_address = $user["avatar"];
            $account->save();
            return $account;
        }
    }
}