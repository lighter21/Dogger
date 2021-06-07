<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WalksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $walks=[[
            'id' => '1',
            'user_id'=>'1',
            'pet_id'=>'1',
            'payment'=>'28',
            'done'=>'1',
            'date'=>'2021-06-20 17:00:00',
            'description'=>'Brak'

        ], [

            'id' => '2',
            'user_id'=>'1',
            'pet_id'=>'1',
            'payment'=>'50',
            'done'=>'0',
            'date'=>'2021-06-22 09:15:00',
            'description'=>'Należy unikać kałuż, ponieważ pies lubi się tarzać w błocie.'
        ],[
            'id' => '3',
            'user_id'=>'3',
            'pet_id'=>'3',
            'payment'=>'23',
            'done'=>'0',
            'date'=>'2021-06-29 14:30:00',
            'description'=>'Brak'


        ],[
            'id' => '4',
            'user_id'=>'2',
            'pet_id'=>'4',
            'payment'=>'70',
            'done'=>'0',
            'date'=>'2021-06-25 6:00:00',
            'description'=>'Lubi aportować piłkę'
        ],[
            'id' => '5',
            'user_id'=>'4',
            'pet_id'=>'5',
            'payment'=>'47',
            'done'=>'1',
            'date'=>'2021-06-08 20:00:00',
            'description'=>'Brak'
        ],[
            'id' => '6',
            'user_id'=>'3',
            'pet_id'=>'3',
            'payment'=>'19',
            'done'=>'0',
            'date'=>'2021-07-10 15:00:00',
            'description'=>'Brak'
        ],[
            'id' => '7',
            'user_id'=>'2',
            'pet_id'=>'4',
            'payment'=>'39',
            'done'=>'0',
            'date'=>'2021-06-27 11:00:00',
            'description'=>'Brak'
        ],[
            'id' => '8',
            'user_id'=>'3',
            'pet_id'=>'2',
            'payment'=>'17',
            'done'=>'0',
            'date'=>'2021-06-23 11:00:00',
            'description'=>'Brak'
        ]];

        foreach ($walks as $walk)
            DB::table('walks')->insert($walk);
    }
}
