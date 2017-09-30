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
    public function getBills(int $userNumber){
        $bills = DB::table('bills')->select('id', 'company', 'paid as bill is paid', 'company_IBAN',
            'date_received as date received')->where('user_id', $userNumber)->get();
         return $bills;
    }

    
}