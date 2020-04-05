<?php
namespace App\Models;


//Class name is equal to file name
//Wen we do use a interface, this is inherance to his childs.
class BaseElement implements Printable{
//Propieties
    //protected property is used to give access to children and the parent
    private $title;
    public $description;
    public $visible = false;
    public $months = 0;
  
//Magic Methods
    public function __construct($title, $description){
      $this->setTitle($title);
      $this->description = $description;
    }
  
//Methods  
    public function setTitle($title){
      if($title == ''){
        $this->title = 'Default Name';
      }else{
        $this->title = $title;
      }
    }
  
    public function getTitle(){
      return $this->title;
    }
  
    public function getDurationAsString(){
      $years = floor($this->months / 12);
      $extraMonths = $this->months%12;
    
      if($years == 0){
        return "$extraMonths months";
      }else if($years != 0){
        return "$years years";
      }
      
    }

    public function getDescription(){
      return $this->description;
    }
  
  }