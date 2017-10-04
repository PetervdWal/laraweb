<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 3-10-17
 * Time: 19:16
 */

namespace App\Services;

use Doctrine\DBAL\Types\GuidType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\Timestamp;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

class UserService
{

    /**
     * Get user by user number
     * @param $userNumber
     * @return mixed Single user object
     */
    public function getUser($userNumber) {
        $user = DB::table('users')->select('name', 'email', 'street', 'home_number', 'phone_number')
            ->where('user_number', $userNumber)->first();//user number has unique constraint in db, so first is safe
        return $user;
    }

    /**
     * Edits the user based on the request
     * @param Request $request the request contains the following keys: userNumber, homeNumber,
     * street, email and phoneNumber
     * @return mixed true or false based on the success of the update
     */
    public function editUser(Request $request){
        $result = DB::table('users')->where('user_number', $request->userNumber)
            ->update(['street' => $request->street, 'home_number' => $request->homeNumber,
                'email' => $request->email, 'phone_number' => $request->phoneNumber]);
        return $result;
    }

    /**
     * Logs a user into the system by setting a (expirable) token
     * @param Request $request
     * @return bool
     */
    public function loginApiUser(Request $request){
        if(Auth::once(['user_number' => $request->userNumber, "password" => $request->password])) {
            $token = $this->setToken($request->userNumber);
            return $token;
        }
    }

    private function setToken($userNumber){
        $token = Uuid::generate(4);
        if(DB::table('tokens')->select("user_number")->get()){
            DB::table('tokens')
                ->where("user_number", $userNumber)
                ->update([
                    "token" => $token,
                    "created_at" => Carbon::now()
                ]);
            $result = true;
        }
        else{
            $result = DB::table('tokens')->insert([
                "user_number" => $userNumber,
                "token" => $token,
                "created_at" => Carbon::now()
            ]);
        }
        if($result){
            return $token;
        }
        else {
            return response("User already has a token", 403);
        }
    }
}