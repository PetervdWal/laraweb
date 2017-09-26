<?php

namespace App\Http\Controllers\API\V1;
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 26-9-17
 * Time: 13:08
 */

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserApiController extends Controller
{

    public function getLogin($email, $password){
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = DB::table('users')->select('name', 'email', 'street', 'home_number', 'phone_number')
                ->where('email', $email)->get();

            return response()->json($user);

        } else {
            return response()->json("{'message': 'Incorrect user and password'}");
        }
    }
}