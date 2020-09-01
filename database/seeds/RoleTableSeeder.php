<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrador',
            'label' => 'admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Recrutador',
            'label' => 'recruiter'
        ]);
    }
}
