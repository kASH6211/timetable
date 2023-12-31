<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Combination;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Teacher;

class Home extends Component
{
    public $combination;
    public $ttarray=[];
    public $population=[];
    public $popcollection;
    public $popsize=50;
    public $grades;
    public $periods;
    public $teachers;



    public function mount()
    {
        $this->combinations=Combination::get();
       $this->grades=Grade::get();
        $this->periods=Period::get();
        $this->teachers=Teacher::get();

        $this->initialize();
        $this->initGA();
    }
    public function render()
    {
        
        $this->combination=Combination::get();

        return view('livewire.home');
    }

    public function initialize()
    {
        
       
        foreach($this->grades as $g)
       {
        //array_push($this->ttarray,$g->id);
        $temparray=[];
        foreach($this->combinations as $i=>$comb)
        {

            if($comb->hassubject->classid==$g->id)
            {
            array_push($temparray,$comb);
            }
        
        
        }
    $this->ttarray[$g->id]=$temparray;
        

    }
    
   }

   public function initGA()
   {
      for($i=0;$i<$this->popsize;$i++)
      {
          $temp=[];

        foreach($this->ttarray as $key=>$tt)
        {
            shuffle($tt);
            //dd($tt);
            $temp[$key]=$tt;
            
           
        }
        array_push($this->population,array('fitness'=>0,'timetable'=>$temp));
       

      }
      $this->popcollection=collect($this->population);

      $this->fitness();
   }

   public function fitness()
   {

    foreach($this->popcollection as $index=>$pop)
    {
        $fit=0;

        foreach($this->periods as $perdind=>$perd)
        {
            $teacherduplicates=[];
            foreach($this->teachers as $teacher)
            {
                $teacherduplicates[$teacher->id]=0;
            }
          foreach($pop['timetable'] as $tt)
          {
            
           
            

                
                
                $teacherduplicates[$tt[$perdind]['teacherid']]+=1;
               
            
           

            }

            foreach($this->teachers as $teacher)
            {
                if($teacherduplicates[$teacher->id]>1)
                {
                    $fit++;
                }
            }
          }
          $pop['fitness']=$fit;
          $this->popcollection[$index]=$pop;
    }
    $this->popcollection=$this->popcollection->sortBy('fitness');
    //dd($this->popcollection);
    $this->crossover();
   }

   public function crossover()
   {
    $portion = collect($this->popcollection->slice(0, 4));
    $cutindex=rand(1,count($this->grades)-1);
    
    $upperpart1=collect($portion->first()['timetable'])->slice(0,$cutindex);
    $lowerpart1=collect($portion->first()['timetable'])->slice($cutindex-1,count($this->grades)-$cutindex);
    $upperpart2=collect($portion->skip(1)->first()['timetable'])->slice(0,$cutindex);
    $lowerpart2=collect($portion->skip(1)->first()['timetable'])->slice($cutindex-1,count($this->grades)-$cutindex);
    collect($portion->skip(2)->first()['timetable'])->splice(0,$cutindex,$upperpart1);
    collect($portion->skip(2)->first()['timetable'])->splice($cutindex-1,count($this->grades)-$cutindex,$lowerpart2);
    $test=collect($portion->skip(3)->first()['timetable'])->splice(0,$cutindex,$upperpart2);
    collect($portion->skip(3)->first()['timetable'])->splice($cutindex-1,count($this->grades)-$cutindex,$lowerpart1);

    // foreach($portion as $p)
    // {
    //     $p['fitness']=0;
    // }
    dd($portion,$test,$this->popcollection->slice(0,4));
   }

   public function mutation()
   {

   }
}
