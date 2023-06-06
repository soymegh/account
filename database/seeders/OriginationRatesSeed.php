<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginationRatesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today()->toDateString();

        DB::table('rate_origin')->insert([
            'rategroup' => 'Default',
            'code' => '+505',
            'destination' => 'Costa Rica',
            'country' => 'Nicaragua',
            'status' => 'Active',
            'connection_cost' => 1.00,
            'cost_min' => 0.25,
            'gracetime' => 1,
            'init_increment' => 0.0,
            'increment' => 60,
            'created_at' => $today,
            'updated_at' => $today
        ]);
    }
}
