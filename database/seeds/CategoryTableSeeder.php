<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            ['name' => 'Programming & Tech', 'icon_code' => 'fas fa-code', 'created_at' => Carbon::now()],
            ['name' => 'Video & Animation', 'icon_code' => 'fas fa-film', 'created_at' => Carbon::now()],
            ['name' => 'Music & Audio', 'icon_code' => 'fas fa-sliders-h', 'created_at' => Carbon::now()],
            ['name' => 'Graphics & Design', 'icon_code' => 'fas fa-palette', 'created_at' => Carbon::now()],
            ['name' => 'Writing & Translation', 'icon_code' => 'fas fa-align-left', 'created_at' => Carbon::now()],
            ['name' => 'Business', 'icon_code' => 'fas fa-briefcase', 'created_at' => Carbon::now()]
        ];

        DB::table('categories')->insert($categories);
    }
}
