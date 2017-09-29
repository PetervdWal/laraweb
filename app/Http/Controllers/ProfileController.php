<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 29-9-2017
 * Time: 20:01
 */

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $warning = "";
        $user = Auth::user();
        $healthInsurance = DB::table('health_insurance_companies')->select('name')->where('id', $user->health_insurance_id)->distinct()->get();
        return view('profile', ['user' => $user, 'healthInsurance' => $healthInsurance ]);

    }
}