<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            ['category_id' => 1, 'title' => 'Android Development', 'featured_img' => 'android_development.png', 'created_at' => Carbon::now()],
            ['category_id' => 1, 'title' => 'Web Development', 'featured_img' => 'web_development.png', 'created_at' => Carbon::now()],
            ['category_id' => 1, 'title' => 'Game Development', 'featured_img' => 'game_development.png', 'created_at' => Carbon::now()],
            ['category_id' => 1, 'title' => 'Cybersecurity', 'featured_img' => 'cybersecurity.png', 'created_at' => Carbon::now()],
            ['category_id' => 1, 'title' => 'Chatbots', 'featured_img' => 'chatbots.png', 'created_at' => Carbon::now()],
            ['category_id' => 1, 'title' => 'Databases', 'featured_img' => 'databases.png', 'created_at' => Carbon::now()]
        ];

        DB::table('subcategories')->insert($subcategories);
    }
}
