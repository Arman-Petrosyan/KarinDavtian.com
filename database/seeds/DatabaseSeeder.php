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
        $this->call(UserSeeder::class);
        $this->call(JewelleryTypeSeeder::class);
        $this->call(JewellerySeeder::class);
        $this->call(InfoSeeder::class);
        $this->call(TermSeeder::class);
    }
}
