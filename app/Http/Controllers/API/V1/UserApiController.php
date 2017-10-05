<?php

namespace App\Http\Controllers\API\V1;
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 26-9-17
 * Time: 13:08
 */

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserApiController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Userlogin and returns basic details of the user
     * @param $email
     * @param $password
     * @return \Illuminate\Http\JsonResponse
     */

    public function getLogin(Request $request){

        $userNumber = $request->userNumber;
        $password = $request->password;
        if(Auth::attempt(['user_number' => $userNumber, 'password' => $password])) {
            $user =  $this->userService->getUser($userNumber);
            return response()->json($user);
        } else {
            return response()->json("{'message': 'Incorrect user and password'}");
        }
    }

    public function editUser(Request $request)
    {
        $result = $this->userService->editUser($request);
        return response()->json($result);
    }

    public function login(Request $request){
        $result = $this->userService->loginApiUser($request);
        if($result){
            return $result;
        } else {
            response("User/password incorrect", 403);
        }

    }
    /**
     * Get the user details
     * @param $userNumber
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request) {
        $userNumber = $request->userNumber;
        $user = DB::table('users as u')
            ->select('u.name as userName', 'u.email as email', 'u.street as street', 'u.home_number as homeNumber',
                'u.phone_number as phoneNumber', 'u.bsn as bsn', 'u.date_of_birth as dateOfBirth',
                'u.policy_number as policyNumber', 'u.insurance_type as insuranceType',
                'u.insurance_start as insuranceStart', 'u.insurance_end as insuranceEnd', 'u.excess as excess',
                'h.name as healthInsuranceCompanyName')
            ->leftJoin('health_insurance_companies as h', 'u.health_insurance_id', '=', 'h.id')
            ->where('user_number', $userNumber)->first();
        return response()->json($user);
    }
}