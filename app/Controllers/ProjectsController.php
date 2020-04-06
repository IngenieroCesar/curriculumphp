<?php
namespace App\Controllers;

use App\Models\Project;
use Respect\Validation\Validator as v;

class ProjectsController extends BaseController{

    public function getAddProjectAction($request){
        $responseMessage = null;

        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody() ;
            $projectValidator = v::key('title', v::stringType()->notEmpty())
            ->key('description', v::stringType()->notEmpty());

            //ESte metodo sirve para resivir el error en el catch
            //Exception es el objeto que contiene el tipo de exepcion que queremos.
            try{
                $projectValidator->assert($postData);  
                    $postData = $request->getParsedBody() ;
                    $project = new Project();
                    $project->title = $postData['title'];
                    $project->description = $postData['description'];
                    $project->visible = true;
                    $project->months = 12;
                    $project->save();
                
                    $responseMessage = 'Project successfully created';
            } catch(\Exception $e){
                $responseMessage = $e->getMessage();
            }  

        }
    
        return $this->renderHTML('addProject.twig', [
            'responseMessage' => $responseMessage,
        ]);
    }
    

}