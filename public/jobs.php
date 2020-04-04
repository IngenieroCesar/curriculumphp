<?php
//We don't use this require because the composer executes this function.
  // require '../app/Models/Job.php';
  // require '../app/Models/Project.php';
  // require_once '../app/Models/Printable.php';
  // require '../lib1/Project.php';
require_once '../vendor/autoload.php'; 

use App\Models\{Job, Project, Printable};


$job1 = new Job('PHP Developer', 'This is a good job!');
$job1->months = 24;

$job2 = new Job('Phyton Dev', 'This is a good job!');
$job2->months = 14;

$job3 = new Job('Devops', 'This is a good job!');
$job3->visible = false;
$job3->months = 17;

$project1 = new Project('Project 1', 'This is a very nice project');

$jobs = [
  $job1,
  $job2,
  $job3
];

$projects = [
  $project1,

];

  
  function printElement( Printable $element){
    // Function content
  
    if($element->visible != true){
      return;
    }
  
    echo ' <li class="work-position">';
    echo ' <h5>' . $element->getTitle() . '</h5>';
    echo ' <p>' . $element->getDescription() . '</p>';
    echo ' <p>' . $element->getDurationAsString() . '</p>';
    echo ' <strong>Achievements:</strong>';
    echo ' <ul>';
    echo ' <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo ' <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo ' <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo ' </ul>';
    echo ' </li>';
  }