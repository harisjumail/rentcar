<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CarbrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carbrand')->insert([
            ['cb_name' => 'Toyota'],
            ['cb_name' => 'Honda'],
            ['cb_name' => 'Ford']
        ]);
    }
}
