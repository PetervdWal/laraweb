<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 30-9-2017
 * Time: 16:41
 */

namespace laravel\Http\Controllers\API\V1;

use laravel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use laravel\Services\BillService;
;
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

        $bill = $this->billService->getBill($id, $userNumber);
        return $bill;
        return response()->json($bill);
    }
}