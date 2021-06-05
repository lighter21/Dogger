<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions=[[
            'id' => '1',
            'sender_id'=>'4',
            'recipient_id' => '2',
            'amount' => '39'
        ],[
            'id' => '2',
            'sender_id'=>'1',
            'recipient_id' => '3',
            'amount' => '28'

        ]];
        foreach ($transactions as $transaction)
            DB::table('transactions')->insert($transaction);
    }
}
