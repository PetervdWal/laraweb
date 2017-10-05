<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('health_insurance_companies')->insert([
            'name' => "Cigna"
        ]);
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.nl',
            'password' => bcrypt("Weschool2!"),
            'user_number' => 11,
            'street' => 'teststreet',
            'date_of_birth' => new DateTime('1994-08-08'),
            'bsn' => '035246029',
            'phone_number' => "061235476",
            'health_insurance_id' => 1,
            'policy_number' => 123,
            'insurance_type' => "Basic",
            'excess' =>  500.00
        ]);

        Model::reguard();
    }
}
