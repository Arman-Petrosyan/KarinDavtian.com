<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Karine',
            'last_name' => 'Davtyan',
            'username' => 'karine.davtyan',
            'email' => 'karine.davtyan@karinedavtyan.com',
            'password' => Hash::make('n1mdaDK321'),
        ]);
    }
}
