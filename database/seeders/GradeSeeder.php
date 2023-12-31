<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();
        $grades = array(array('grade'=>"Ist",'noofstudents'=>"31"),
        array('grade'=>"2nd",'noofstudents'=>"32"),
        array('grade'=>"3rd",'noofstudents'=>"33"),
        array('grade'=>"4th",'noofstudents'=>"34"),
        array('grade'=>"5th",'noofstudents'=>"35"),
        
    );

    
    DB::table('grades')->insert($grades);
    }
}
