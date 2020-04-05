<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Class name is equal to file name
class Project extends Model {
    protected $table = 'projects';
    
    public function getDurationAsString(){
        $years = floor($this->months / 12);
        $extraMonths = $this->months%12;
      
        if($years == 0){
          return "Project duration; $extraMonths months";
        }else if($years != 0){
          return "Project duration: $years years";
        }
        
      }
}