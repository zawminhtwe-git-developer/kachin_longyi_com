<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
//    public function redirectToGoogle(){
//        return Socialite::driver('google')->redirect();
//    }
//    public function handleGoogleCallback(){
////        $user = Socialite::driver('google')->user();
////        dd ($user);
//        try {
//            $user = Socialite::driver('google')->user();
//
//            $finduser = User::where('google_id', $user->id)->first();
//
//            if($finduser){
//
//                Auth::login($finduser);
//
//                return redirect()->intended('home');
//
//            }else{
//                $newUser = User::create([
//                    'name' => $user->name,
//                    'email' => $user->email,
//                    'google_id'=> $user->id,
//                    'password' => encrypt('123456dummy')
//                ]);
//
//                Auth::login($newUser);
//
//                return redirect()->intended('home');
//            }
//        }catch (Exception $e){
//            dd ($e->getMessage());
//
//        }
//    }
}
