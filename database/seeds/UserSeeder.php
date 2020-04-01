<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            ['name' => 'Eima', 'email' => 'eima@user.com', 'password' => bcrypt('Eima123456'), 'created_at' => Carbon::now()],
            ['name' => 'Lina', 'email' => 'lina@user.com', 'password' => bcrypt('Lina123456'), 'created_at' => Carbon::now()],
        ];

        DB::table('users')->insert($users);
    }
}
