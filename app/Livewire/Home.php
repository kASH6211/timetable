<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Combination;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;
class Home extends Component
{
    public $combination;
    public $ttarray=[];
    public $population=[];
    public $popcollection;
    public $popsize=10;
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
        
    }
    public function render()
    {
        $this->GA();
        $this->combination=Combination::get();

        return view('livewire.home');
    }

    public function GA()
    {
        $this->initGA();
        $this->fitness();
        $str=null;
        for($i=0;$i<1000;$i++)
        {
            $str=null;
        $this->crossover();
        $this->mutation();
        $this->fitness();
        foreach($this->popcollection as $key=>$pop)
        {
            $str=$str.$key.'-->'.$pop['fitness'].'--';
        }
        //Log::info(key(head($this->popcollection)).'-->'.$this->popcollection->first()['fitness']);
        Log::info($str);
    }
        
        dd($this->popcollection);



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
    //$this->crossover();
   }

   public function crossover()
   {
    $portion = collect($this->popcollection->slice(0, 4));
    
    $cutindex=rand(1,count($this->grades)-1);
    
    $upperpart1=collect($portion->first()['timetable'])->slice(0,$cutindex);
    $upperpart1=$upperpart1->toarray();
   //dd($upperpart1);
    $lowerpart1=collect($portion->first()['timetable'])->slice($cutindex,count($this->grades)-$cutindex);
    $lowerpart1=$lowerpart1->toarray();
    $upperpart2=collect($portion->skip(1)->first()['timetable'])->slice(0,$cutindex);
    $upperpart2=$upperpart2->toarray();
    $lowerpart2=collect($portion->skip(1)->first()['timetable'])->slice($cutindex,count($this->grades)-$cutindex);
    $lowerpart2=$lowerpart2->toarray();
    //dd($lowerpart2);
    $portioncollection3=$portion->skip(2)->first()['timetable'];
    
    $pcak=array_keys($portioncollection3);
    //dd($portioncollection3[$pcak[0]]);
    for($i=0;$i<$cutindex;$i++)
    {
        $portioncollection3[$pcak[$i]]=$upperpart1[$pcak[$i]];
    }
    for($i=$cutindex;$i<count($this->grades);$i++)
    {
        $portioncollection3[$pcak[$i]]=$lowerpart2[$pcak[$i]];
    }

    //dd($portioncollection3);

    $portioncollection4=$portion->skip(3)->first()['timetable'];
    $pcak=array_keys($portioncollection4);
    for($i=0;$i<$cutindex;$i++)
    {
        $portioncollection4[$pcak[$i]]=$upperpart2[$pcak[$i]];
    }
    for($i=$cutindex;$i<count($this->grades);$i++)
    {
        $portioncollection4[$pcak[$i]]=$lowerpart1[$pcak[$i]];
    }


      $keyar=array_keys($portion->toArray());
    
    
    $pr=$portion->toArray();
    $pr[$keyar[2]]=["fitness"=>0,"timetable"=>$portioncollection3];
    $pr[$keyar[3]]=["fitness"=>0,"timetable"=>$portioncollection4];

    $this->popcollection=$this->popcollection->toArray();
    $bigkeyar=array_keys($this->popcollection);
    $this->popcollection[$bigkeyar[8]]=["fitness"=>0,"timetable"=>$portioncollection3];
    $this->popcollection[$bigkeyar[9]]=["fitness"=>0,"timetable"=>$portioncollection4];
    $this->popcollection=collect($this->popcollection);
    // foreach($portion as $p)
    // {
    //     $p['fitness']=0;
    // }
    // dd($this->popcollection);
    // dd($portion,$test,$this->popcollection->slice(0,4));
   }
    
   public function mutation()
   {
    $randmutationrate=rand(1,4);
    if($randmutationrate<1)
    {
        return;
    }
    
    mt_srand(microtime(true) * 1000000);
    $randclass=rand(1,5);
    $randperid1=rand(0,5);
    $randperid2=rand(0,5);
    Log::info($randperid1.'=='.$randperid2);
    $temp=$this->popcollection->first()['timetable'][$randclass][$randperid1];

    
    $this->popcollection->first()['timetable'][$randclass][$randperid1]=$this->popcollection->first()['timetable'][$randclass][$randperid2];
    //dd($temp, $this->popcollection->first()['timetable'][$randclass][$randperid1]);
    $this->popcollection->first()['timetable'][$randclass][$randperid2]=$temp;

    $randclass=rand(1,5);
    $randperid1=rand(0,5);
    $randperid2=rand(0,5);
    $temp=$this->popcollection->skip(1)->first()['timetable'][$randclass][$randperid1];
    $this->popcollection->skip(1)->first()['timetable'][$randclass][$randperid1]=$this->popcollection->skip(1)->first()['timetable'][$randclass][$randperid2];
    $this->popcollection->skip(1)->first()['timetable'][$randclass][$randperid2]=$temp;
}

   public function selection()
   {

   }
}
