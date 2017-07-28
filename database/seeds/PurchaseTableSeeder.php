<?php

use Illuminate\Database\Seeder;
use Charlie\Purchase;

class PurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Purchase::truncate();
        factory(Purchase::class,100)->create();
    }
}
