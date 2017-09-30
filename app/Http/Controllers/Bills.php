<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//TODO: Bills rename to BillsController
class Bills extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBills()
    {
        $warning = "";
        $bills = [];
        $COLUMNNAMES = ['bill id', 'company', 'bill is paid', 'company IBAN', 'date received'];
        $user = Auth::user();
        $apiRequest = Request::create('/api/v1/bills/getBills', "POST", ["userNumber" =>
        $user->user_number]);
        $bills = app()->handle($apiRequest)->getData();

        return view('bills', ['bills' => $bills, 'columns' => $COLUMNNAMES, 'warning' => $warning]);
    }

      /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warning = "";
        $rows = NULL;
        $COLUMNNAMES = ['treatment code', 'treatment description', 'total price', 'user price', 'user paid', 'insurance price', 'insurance paid', 'treatment given at'];
        //Distinct
        $user = Auth::user();
        $apiRequest = Request::create('/api/v1/bills/getBills', 'POST', ["userNumber" => $user->userNumber, "id" => $id]);
        $rows = app()->handle($apiRequest)->getData();
        return view('billDetails', ['rows' => $rows, 'columns' => $COLUMNNAMES, 'warning' => $warning]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
