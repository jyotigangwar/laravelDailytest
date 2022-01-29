<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $user = User::create([

            'name' => 'admin jyoti',

            'email' => 'jyoti.rani@neosoftmail.com',

            'password' => bcrypt('jyotirani'),

            'is_admin' => true


        ]);
        //A role can be assigned to any user

        
    }
}

