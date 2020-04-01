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
            ['category_id' => 1, 'title' => 'Android Development', 'featured_img' => '1585737403.png', 'created_at' => Carbon::now()]
        ];

        DB::table('subcategories')->insert($subcategories);
    }
}
