<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 4-10-2017
 * Time: 12:57
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ApiAuth
{
    public function handle(Request $request, Closure $next){
        $response =$this->authenticate($request->userNumber, $request->token);
        if($response->getStatusCode() != 200){
            return $response;
        }
        return $next($request);
    }

    private function authenticate($userNumber, $token) {
        $user = DB::table('users')->select('id')->where("user_number", $userNumber)->first();
        $response = response();
        if($user){
            $result = DB::table('tokens')
                ->select('created_at')
                ->where('user_number', '=', $userNumber)
                ->where('token', '=', $token)
                ->first();
            if($result == null) {
                return response("User token combination not found, please login again", 440);
            }
            if(Carbon::createFromFormat('Y-m-d H:i:s', $result->created_at)->diffInMinutes(Carbon::Now()) > 3){
                return response("Token expired, please login again", 440);
            }
            return response("succes", 200);
        }
        return response("User does not exist", 403);
    }
}