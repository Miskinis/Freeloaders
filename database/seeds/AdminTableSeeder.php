<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins =[
            ['name' => 'Eima', 'email' => 'eima@admin.com', 'password' => bcrypt('Eima123456'), 'created_at' => Carbon::now()],
            ['name' => 'Lina', 'email' => 'lina@admin.com', 'password' => bcrypt('Lina123456'), 'created_at' => Carbon::now()],
        ];

        DB::table('admins')->insert($admins);
    }
}
