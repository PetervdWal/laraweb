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
use \BillService;

class BillsApiController extends Controller
{
    protected $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function getBills(Request $request) {
        $userNumber = $request->userNumber;

        $bills  = $this->billService->getBills($userNumber);
        return response()->json($bills);
    }

    public function getBill(Request $request){
        $userNumber = $request->userNumber;
        $id = $request->billId;
        $bill = DB::table('bills')->select()->where([['id','=' , $id], ['bill_reciever', '=',$userNumber]])->distinct()->get();
        return response()->json($bill);
    }
}