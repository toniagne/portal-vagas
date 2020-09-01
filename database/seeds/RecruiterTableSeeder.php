<?php

use Illuminate\Database\Seeder;

class RecruiterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Inovve Dados',
            'role_id' => 2,
            'email' => 'toni.agne@inovedados.com.br',
            'password' => bcrypt('123mudar'),
            'varchar' => '0',
            'active'   => 1
        ]);
    }
}
