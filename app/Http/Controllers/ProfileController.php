<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 29-9-2017
 * Time: 20:01
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\UserService;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 * Controller for the profile view. This class can show the page and handle the form.
 */
class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Shows the profile.
     * Requires a logged in user when the function is called.
     */
    public function showProfile()
    {
        $warning = "";
        $user = Auth::user();
        $healthInsurance = DB::table('health_insurance_companies')
            ->select('name')
            ->where('id', $user->health_insurance_id)
            ->distinct()
            ->get();
        return view('profile', ['user' => $user, 'healthInsurance' => $healthInsurance ]);

    }

    /**
     * @param Request $request the HTTP request of the form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Edits the user based on values of the form
     */
    public function editUser(Request $request){
        $response = $this->userService->editUser($request);
        if($response){
           return $this->showProfile();
        }

    }

    public function loginWebUser(Request $request){
        $response = $this->userService->loginWebUser($request);
        return $response;
    }
}