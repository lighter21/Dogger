<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgreementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agreements=[[
            'id' => '1',
            'walk_id'=>'1',
            'pet_id' => '1',
            'tenant_id' => '3',
            'active' => '1',
        ], [
            'id' => '2',
            'walk_id'=>'5',
            'pet_id' => '5',
            'tenant_id' => '2',
            'active' => '1',
        ], [
            'id' => '3',
            'walk_id'=>'2',
            'pet_id' => '1',
            'tenant_id' => '4',
            'active' => '1',
        ], [
            'id' => '4',
            'walk_id'=>'3',
            'pet_id' => '3',
            'tenant_id' => '1',
            'active' => '1',
        ], [
            'id' => '5',
            'walk_id'=>'4',
            'pet_id' => '4',
            'tenant_id' => '3',
            'active' => '0',
        ], [
            'id' => '6',
            'walk_id'=>'6',
            'pet_id' => '3',
            'tenant_id' => '2',
            'active' => '0',
        ]];

        foreach ($agreements as $agreement)
            DB::table('agreements')->insert($agreement);
    }
}
