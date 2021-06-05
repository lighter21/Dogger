<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallets=[[
            'id' => '1',
            'user_id' => '1',
            'account_balance' => '200'

        ], [

            'id' => '2',
            'user_id' => '2',
            'account_balance' => '75'

        ],[
            'id' => '3',
            'user_id' => '3',
            'account_balance' => '49'



        ],[
            'id' => '4',
            'user_id' => '4',
            'account_balance' => '118'

        ]];

        foreach ($wallets as $wallet)
            DB::table('wallets')->insert($wallet);
    }
}
