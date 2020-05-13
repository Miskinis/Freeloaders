<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminTableSeeder::class,
            UserTableSeeder::class,
            CategoryTableSeeder::class,
            SubcategoryTableSeeder::class,
        ]);
        $this->call(PostsTableSeeder::class);
    }
}
