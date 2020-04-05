<?php
//We don't use this require because the composer executes this function.
  // require '../app/Models/Job.php';
  // require '../app/Models/Project.php';
  // require_once '../app/Models/Printable.php';
  // require '../lib1/Project.php';


use App\Models\{Job, Project};

$jobs = Job::all();

$projects = Project::all();
  
  function printElement( $element){
    // Function content
  
    // if($job->visible != true){
    //   return;
    // }
  
    echo ' <li class="work-position">';
    echo ' <h5>' . $element->title . '</h5>';
    echo ' <p>' . $element->description . '</p>';
    echo ' <p>' . $element->getDurationAsString() . '</p>';
    echo ' <strong>Achievements:</strong>';
    echo ' <ul>';
    echo ' <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo ' <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo ' <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo ' </ul>';
    echo ' </li>';
  }