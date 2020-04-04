<?php
namespace App\Models;


//Class name is equal to file name
class Job extends BaseElement {

    //Magic Methods
    //Parent constructor inheritance
    public function __construct($title, $description){
        $newTitle = 'Job: ' . $title;
        parent::__construct($newTitle, $description);
    }


    //Methods
    //Polymorphism, because we rewrite the method written in his father.
    public function getDurationAsString(){
        $years = floor($this->months / 12);
        $extraMonths = $this->months%12;
      
        if($years == 0){
          return "Job duration; $extraMonths months";
        }else if($years != 0){
          return "Job duration: $years years";
        }
        
      }

}