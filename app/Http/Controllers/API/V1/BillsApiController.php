<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 30-9-2017
 * Time: 16:41
 */

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BillsApiController extends Controller
{
    public function getBills(Request $request) {
        $userNumber = $request->userNumber;

        $bills  = DB::table('bills')->select('id', 'company', 'paid as bill is paid', 'company_IBAN',
            'date_received as date received')->where('user_id', $userNumber)->get();

        return response()->json($bills);
    }

    public function getBill(Request $request){
        $userNumber = $request->userNumber;
        $id = $request->billId;
        $bill = DB::table('bills')->select()->where([['id','=' , $id], ['bill_reciever', '=',$userNumber]])->distinct()->get();
        return response()->json($bill);
    }
}