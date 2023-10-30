<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            [
                'id_reg' => 1,
                'description' => 'Region Norte',
                'status' => 'A',
            ],
            [
                'id_reg' => 2,
                'description' => 'Region Sur',
                'status' => 'A',
            ],
        ]);

        DB::table('communes')->insert([
            [
                'id_com' => 1,
                'description' => 'Toluca',
                'status' => 'A',
                'id_reg' => 1,
            ],
            [
                'id_com' => 2,
                'description' => 'Ixtapan',
                'status' => 'A',
                'id_reg' => 2,
            ],
        ]);

        DB::table('customers')->insert([
            [
                'dni' => "70218511",
                'id_com' => 1,
                'id_reg' => 1,
                'name' => 'Alex Oscar',
                'last_name' => 'Gamarra Solis',
                'status' => 'A',
                'email' => 'alex@gmail.com',
                'address' => 'Jr. Ramón Castilla 110',
                'date_reg' => Carbon::now(),
                'deleted' => false,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dni' => "80218522",
                'id_com' => 1,
                'id_reg' => 1,
                'name' => 'Maria',
                'last_name' => 'Perez',
                'status' => 'A',
                'email' => 'maria@gmail.com',
                'address' => 'Jr. Ramón Castilla 110',
                'date_reg' => Carbon::now(),
                'deleted' => false,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
