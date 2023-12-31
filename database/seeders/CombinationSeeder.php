<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CombinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('combinations')->delete();
        $periods = array(array('subjectid'=>"1",'teacherid'=>"1"),
        array('subjectid'=>"2",'teacherid'=>"2"),
        array('subjectid'=>"3",'teacherid'=>"3"),
        array('subjectid'=>"4",'teacherid'=>"4"),
        array('subjectid'=>"5",'teacherid'=>"5"),
        array('subjectid'=>"6",'teacherid'=>"6"),
        array('subjectid'=>"7",'teacherid'=>"1"),
        array('subjectid'=>"8",'teacherid'=>"2"),
        array('subjectid'=>"9",'teacherid'=>"3"),
        array('subjectid'=>"10",'teacherid'=>"4"),
        array('subjectid'=>"11",'teacherid'=>"5"),
        array('subjectid'=>"12",'teacherid'=>"6"),
        array('subjectid'=>"13",'teacherid'=>"1"),
        array('subjectid'=>"14",'teacherid'=>"2"),
        array('subjectid'=>"15",'teacherid'=>"3"),
        array('subjectid'=>"16",'teacherid'=>"4"),
        array('subjectid'=>"17",'teacherid'=>"5"),
        array('subjectid'=>"18",'teacherid'=>"6"),
        array('subjectid'=>"19",'teacherid'=>"1"),
        array('subjectid'=>"20",'teacherid'=>"2"),
        array('subjectid'=>"21",'teacherid'=>"3"),
        array('subjectid'=>"22",'teacherid'=>"4"),
        array('subjectid'=>"23",'teacherid'=>"5"),
        array('subjectid'=>"24",'teacherid'=>"6"),
        array('subjectid'=>"25",'teacherid'=>"1"),
        array('subjectid'=>"26",'teacherid'=>"2"),
        array('subjectid'=>"27",'teacherid'=>"3"),
        array('subjectid'=>"28",'teacherid'=>"4"),
        array('subjectid'=>"29",'teacherid'=>"5"),
        array('subjectid'=>"30",'teacherid'=>"6"),

    );

    
    DB::table('combinations')->insert( $periods);
    }
}
