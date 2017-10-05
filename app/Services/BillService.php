<?php

namespace App\Services;

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
     *
     * @param int $userNumber
     */
    public function getBills(int $userNumber)
    {
        $bills = DB::table('bills')->select('id', 'company', 'paid as bill is paid', 'company_IBAN',
            'date_received as date received')->where('user_id', $userNumber)->get();
        return $bills;
    }

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
            ->join('bills as b', function ($join) use ($userNumber) {
                $join->on("detail.bill_id", "=", 'b.id')
                    ->where("b.user_id", "=", $userNumber);
                    }
                 )
            ->where('detail.id', $billId)
            ->distinct()
            ->get();

        return $bill;
    }
}