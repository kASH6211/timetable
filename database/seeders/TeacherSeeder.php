<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->delete();
        $teachers = array(array('name'=>"sadaf",'qualification'=>"M.Sc Physics"),
        array('name'=>"Iqra",'qualification'=>"M.A Punjabi"),
        array('name'=>"Iram",'qualification'=>"M.Sc Bio"),
        array('name'=>"Mariam",'qualification'=>"M.A english"),
        array('name'=>"Shazia",'qualification'=>"M.A Hindi"),
        array('name'=>"Sobia",'qualification'=>"M.A S.S."),
    );

    
    DB::table('teachers')->insert($teachers);
    }
    
}
