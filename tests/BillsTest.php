<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BillsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBills()
    {
        $this->visit('/auth/login')
            ->type('test@test.nl', 'email')
            ->type('test', 'password')
            ->press("Login");
        $user = Auth::user();
        $bill = DB::table('bills')->select()->where('user_id', $user->id)->get()[0];

        $this->assertNotNull(Auth::user());
        $this->visit('/bills')
            ->see('Bills')
            ->see($bill->id)
            ->see($bill->user_id)
            ->see($bill->company)
            ->see($bill->paid)
            ->see($bill->date_received);
    }

    public function testBillDetails()
    {

        $this->visit('/auth/login')
            ->type('test@test.nl', 'email')
            ->type('test', 'password')
            ->press("Login");
        $user = Auth::user();
        $bill = DB::table('bills')->select()->where('id', 1)->get()[0];
        $bill_content = DB::table('bills_content')->select()->where('bill_id',1)->get()[0];
        $this->assertNotNull(Auth::user());
        $this->visit('/bills/1')
            ->see('The Bills Page')
            ->see($bill_content->treatment_code)
            ->see($bill_content->treatment_description)
            ->see($bill_content->total_price)
            ->see($bill_content->user_price)
            ->see($bill_content->user_paid)
            ->see($bill_content->insurance_price)
            ->see($bill_content->insurance_paid)
            ->see($bill_content->treatment_given_at);
    }
}