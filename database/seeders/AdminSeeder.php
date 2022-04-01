<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('users')->delete();
        $users =
            [
                ['email' => 'admin@astract.com', 'name'=> 'Administrator',  'password' => bcrypt('123456')],
                ];

        foreach ($users as $user) {
            $user = \App\Models\User::create($user);
            $user->save();
            
        }

    }
}
