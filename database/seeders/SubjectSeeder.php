<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->delete();
        $periods = array(array('classid'=>"1",'subjectname'=>"English"),
        array('classid'=>"1",'subjectname'=>"Punjabi"),
        array('classid'=>"1",'subjectname'=>"Hindi"),
        array('classid'=>"1",'subjectname'=>"Science"),
        array('classid'=>"1",'subjectname'=>"SST"),
        array('classid'=>"1",'subjectname'=>"Maths"),
        array('classid'=>"2",'subjectname'=>"English"),
        array('classid'=>"2",'subjectname'=>"Punjabi"),
        array('classid'=>"2",'subjectname'=>"Hindi"),
        array('classid'=>"2",'subjectname'=>"Science"),
        array('classid'=>"2",'subjectname'=>"SST"),
        array('classid'=>"2",'subjectname'=>"Maths"),
        array('classid'=>"3",'subjectname'=>"English"),
        array('classid'=>"3",'subjectname'=>"Punjabi"),
        array('classid'=>"3",'subjectname'=>"Hindi"),
        array('classid'=>"3",'subjectname'=>"Science"),
        array('classid'=>"3",'subjectname'=>"SST"),
        array('classid'=>"3",'subjectname'=>"Maths"),
        array('classid'=>"4",'subjectname'=>"English"),
        array('classid'=>"4",'subjectname'=>"Punjabi"),
        array('classid'=>"4",'subjectname'=>"Hindi"),
        array('classid'=>"4",'subjectname'=>"Science"),
        array('classid'=>"4",'subjectname'=>"SST"),
        array('classid'=>"4",'subjectname'=>"Maths"),
        array('classid'=>"5",'subjectname'=>"English"),
        array('classid'=>"5",'subjectname'=>"Punjabi"),
        array('classid'=>"5",'subjectname'=>"Hindi"),
        array('classid'=>"5",'subjectname'=>"Science"),
        array('classid'=>"5",'subjectname'=>"SST"),
        array('classid'=>"5",'subjectname'=>"Maths"),
    );

    
    DB::table('subjects')->insert( $periods);
    }
}
