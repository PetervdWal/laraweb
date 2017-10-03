<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 3-10-17
 * Time: 19:16
 */

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
}