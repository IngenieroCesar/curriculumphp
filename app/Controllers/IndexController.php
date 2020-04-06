<?php

namespace App\Controllers;

use App\Models\{Job, Project};


class IndexController extends BaseController {

public function indexAction(){

    $jobs = Job::all();

    $projects = Project::all();

    $name = 'Cesar Garzón';
    $limitMonths = 72;

    return $this->renderHTML('index.twig', [
        'name' => $name,
        'jobs' => $jobs,
        'projects' => $projects,
    ]);


    // $totalMonts = 0;
    // for($idx = 0; $idx < count($jobs); $idx ++ ){
    //   $totalMonts += $jobs[$idx]->months;

    //   if($totalMonts > $limitMonths){
    //   break;
    //   }

    //   printElement($jobs[$idx]);
    // }


}

}