<?php
namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{

public function getAddJobAction($request){
    $responseMessage = null;

    if($request->getMethod() == 'POST'){
        $postData = $request->getParsedBody();
        $jobValidator = v::key('title', v::stringType()->notEmpty())
                         ->key('description', v::stringType()->notEmpty());
        //ESte metodo sirve para resivir el error en el catch
        //Exception es el objeto que contiene el tipo de exepcion que queremos.
        try{
            $jobValidator->assert($postData);  
                $postData = $request->getParsedBody() ;

                $files = $request->getUploadedFiles();
                $logo = $files['logo'];

                $job = new Job();
                $job->title = $postData['title'];
                $job->description = $postData['description'];
                $job->visible = true;
                $job->months = 6;

                //Para guardar el nombre de la imagen que corresponde
                //debemos asegurarnos que viene el archivo, si no viene dejamos a none como
                //nombre por default
                if($logo->getError() == UPLOAD_ERR_OK){
                    //This interface has been declarate in psr7
                    $fileName = $logo->getClientFilename();
                    $logo->moveTo("uploads/$fileName");
                    $job->img = $fileName;
                }else {
                    $job->img = 'None';
                }
                
                $job->save(); 
            
                $responseMessage = 'Job successfully created';
        } catch(\Exception $e){
            $responseMessage = $e->getMessage();
        }              


    }


    return $this->renderHTML('addJob.twig', [
        'responseMessage' => $responseMessage,
    ]);
}


}