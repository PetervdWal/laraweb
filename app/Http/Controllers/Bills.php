<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $bills = NULL;
        $COLUMNNAMES = ['bill id', 'company', 'bill is paid', 'company IBAN', 'date received'];
        $user = Auth::user();

        if ($user) {
            $bills = DB::table('bills')->select('id', 'company', 'paid as bill is paid', 'company_IBAN', 'date_received as date received')->where('user_id', $user->id)->get();

        } else {
            $warning = "No logged in user found. Please log in.";
        }

        return view('bills', ['bills' => $bills, 'columns' => $COLUMNNAMES, 'warning' => $warning]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $bill = DB::table('bills')->select()->where('id', $id)->first();
        $user = Auth::user();


        if ($user && $user->id == $bill->user_id) {
            $rows = DB::table('bills_content')->select('treatment_code', 'treatment_description', 'total_price', 'user_price', 'user_paid', 'insurance_price', 'insurance_paid', 'treatment_given_at')->where('bill_id', $id)->get();

        } else {
            $warning = "No logged in user found. Please log in.";
        }

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
