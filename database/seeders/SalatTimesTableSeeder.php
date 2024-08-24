<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalatTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salat_times')->insert([
            ['name' => 'Fajr', 'time' => '05:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dhuhr', 'time' => '12:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Asr', 'time' => '15:30:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Maghrib', 'time' => '18:45:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Isha', 'time' => '20:15:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
