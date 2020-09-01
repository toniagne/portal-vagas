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
        //$this->call(StateTableSeeder::class);
        //$this->call(CitiesTableSeeder::class);
        //$this->call(JobCategoriesSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RecruiterTableSeeder::class);
    }
}
