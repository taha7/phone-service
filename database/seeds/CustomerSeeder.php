<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = DB::connection('sqlite')->table('customer')->get();

        foreach ($customers as $customer) {
            Customer::create([
                'name' => $customer->name,
                'phone' => $customer->phone
            ]);
        }
    }
}
