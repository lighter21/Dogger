<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[[
            'id' => '1',
            'name' => 'Jakub Kowalski',
            'email' => 'jakub.k@gmail.com',
            'password' => Hash::make('Qwerty123'),
            'street'=>'Strzelecka',
            'house_number' => '12',
            'postcode' => '34-215',
            'city' => 'Zawadzkie',
            'phone_number' => '697482684'

        ], [

            'id' => '2',
            'name' => 'Teresa Nowak',
            'email' => 'teresia123@interia.pl',
            'password' => Hash::make('Qwerty123'),
            'street'=>'Powstańców Śląskich',
            'house_number' => '13/2',
            'postcode' => '45-011',
            'city' => 'Opole',
            'phone_number' => '658471264'
        ],[
            'id' => '3',
            'name' => 'Julia Małysz',
            'email' => 'julka123@interia.pl',
            'password' => Hash::make('Qwerty123'),
            'street'=>'Lubliniecka',
            'house_number' => '114',
            'postcode' => '47-158',
            'city' => 'Strzelce Opolskie',
            'phone_number' => '856974158'


        ],[
            'id' => '4',
            'name' => 'Bartosz Karolak',
            'email' => 'bartkar987@gmail.com',
            'password' => Hash::make('Qwerty123'),
            'street'=>'Opolska',
            'house_number' => '12',
            'postcode' => '34-215',
            'city' => 'Krapkowice',
            'phone_number' => '984758125'
        ]];

        foreach ($users as $user)
            DB::table('users')->insert($user);


    }
}
