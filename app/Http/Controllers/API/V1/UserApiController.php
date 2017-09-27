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
    public function getUser($email) {
        $user = DB::table('users as u')
            ->select('u.name', 'u.email', 'u.street', 'u.home_number', 'u.phone_number', 'h.name as HealthName')
            ->leftJoin('health_insurance_companies as h', 'u.health_insurance_id', '=', 'h.id')
            ->where('email', $email)->get();

        return response()->json($user);
    }
}