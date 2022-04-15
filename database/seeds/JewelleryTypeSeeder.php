<?php

use Illuminate\Database\Seeder;

class JewelleryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jewellery_types')->insert([
            [
                'name' => 'Earing',
            ],
            [
                'name' => 'Ring',
            ],
            [
                'name' => 'Neckles',
            ],
            [
                'name' => 'Brosch',
            ],
            [
                'name' => 'Bracelets',
            ],
            [
                'name' => 'Sets',
            ],
        ]);
    }
}
