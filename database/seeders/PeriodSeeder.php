<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periods')->delete();
        $periods = array(array('timings'=>"9:00 AM"),
        array('timings'=>"10:00 AM"),
        array('timings'=>"11:00 AM"),
        array('timings'=>"12:00 AM"),
        array('timings'=>"01:00 PM"),
        array('timings'=>"02:00 PM"),
    );

    
    DB::table('periods')->insert( $periods);
    }
}
