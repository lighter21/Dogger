<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pets=[[
            'id' => '1',
            'user_id'=>'1',
            'name' => 'Max',
            'type' => 'Pies',
            'breed' => 'Labrador',
            'file_path'=>''
        ], [

            'id' => '2',
            'user_id'=>'3',
            'name' => 'Luna',
            'type' => 'Pies',
            'breed' => 'Rottweiler',
            'file_path'=>''
        ],[
            'id' => '3',
            'user_id'=>'3',
            'name' => 'Kicia',
            'type' => 'Kot',
            'breed' => 'Kot Syjamski',
            'file_path'=>''


        ],[
            'id' => '4',
            'user_id'=>'2',
            'name' => 'Dino',
            'type' => 'Pies',
            'breed' => 'Labrador',
            'file_path'=>''
        ], [
            'id' => '5',
            'user_id'=>'4',
            'name' => 'Leo',
            'type' => 'Pies',
            'breed' => 'Husky sybersyjski',
            'file_path'=>''
        ]];

        foreach ($pets as $pet)
            DB::table('pets')->insert($pet);
    }
}
