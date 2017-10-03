<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\BillService;

class BillController extends Controller
{
    protected $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBills()
    {
        $warning = "";
        $COLUMNNAMES = ['bill id', 'company', 'bill is paid', 'company IBAN', 'date received'];
        $user = Auth::user();
        $bills = $this->billService->getBills($user->user_number);
        return view('bills', ['bills' => $bills, 'columns' => $COLUMNNAMES, 'warning' => $warning]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showDetails($id)
    {
        $warning = "";
        $rows = NULL;
        $COLUMNNAMES = ['treatment code', 'treatment description', 'total price', 'user price', 'user paid',
            'insurance price', 'insurance paid', 'treatment given at'];
        //Distinct
        $user = Auth::user();
        $apiRequest = Request::create('/api/v1/bills/getBills', 'POST', ["userNumber" => $user->userNumber, "id" => $id]);
        $rows = app()->handle($apiRequest)->getData();
        return view('billDetails', ['rows' => $rows, 'columns' => $COLUMNNAMES, 'warning' => $warning]);
    }

}
