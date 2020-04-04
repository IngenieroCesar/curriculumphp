<?php
namespace App\Models;

//with the interfaces we have conditions to apply in our classes or functions
interface Printable {
    //Interfaces only use public functions
    public function getDescription();
}