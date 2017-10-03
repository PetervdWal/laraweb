<?php

namespace laravel\Services;

/**
 * Created by PhpStorm.
 * User: peter
 * Date: 30-9-17
 * Time: 19:59
 */
use Illuminate\Support\Facades\DB;

class BillService
{
    /**
     *Gets the bills based on the usernumber
     * @param int $userNumber This is the usernumber with wich a user logs in.
     * @return mixed bills  Collection of bills, each row contains id, company, billIsPaid and companyIban
     */
    public function getBills(int $userNumber)
    {
        $bills = DB::table('bills')->select('id', 'company', 'paid as billIsPaid', 'company_IBAN as companyIban',
            'date_received as date received')->where('user_id', $userNumber)->get();
        return $bills;
    }

    /**
     * returns the details of a specific bill based on billId and user_number
     * @param $billId
     * @param $userNumber the usernumber that is used to login
     * @return mixed returns a collection of details.
     */
    public function getBill($billId, $userNumber)
    {

        $bill = DB::table('bills_content as detail')->select(
            'detail.treatment_code as treatmentCode',
            'detail.treatment_description as treatmentDescription',
            'detail.total_price as totalPrice',
            'detail.user_price as userPrice',
            'detail.user_paid as userPaid',
            'detail.insurance_price as insurancePrice',
            'detail.insurance_paid as insurancePaid',
            'detail.treatment_given_at as treamentGivenAt')
            ->join('bills as b', function ($join) use ($userId) {
                $join->on("detail.bill_id", "=", 'b.id')
                    ->where("b.user_id", "=", $userId);
                    }
                 )
            ->where('detail.id', $billId)
            ->distinct()
            ->get();

        return $bill;
    }
}