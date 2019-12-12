<?php

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\Account;
class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        // dd($providerUser->getId());
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        // dd($account);
        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            // dd($providerUser->getEmail());
            $user = User::whereEmail($email)->first();
            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'password' => bcrypt($email),
                    'refferal_code' => getToken(12),
                    'status' => 1,
                ]);
                $insertAccount = Account::insert([
                    'user_id' => $user->id,
                    'name' => $providerUser->getName(),
                ]);
            }
            
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}