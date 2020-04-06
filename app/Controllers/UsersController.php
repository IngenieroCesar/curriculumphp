<?php 

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class UsersController extends BaseController{

    public function getAddUserAction($request){
        $responseMessage = null;

        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody() ;
            $userValidator = v::key('name', v::stringType()->notEmpty())
            ->key('email', v::stringType()->notEmpty())
            ->key('password', v::stringType()->notEmpty());

            //Este metodo sirve para resivir el error en el catch
            //Exception es el objeto que contiene el tipo de exepcion que queremos.
            try{
                $userValidator->assert($postData);  
                    $postData = $request->getParsedBody() ;
                    $user = new User();
                    $user->name = $postData['name'];
                    $user->email = $postData['email'];
                    //Se usa password_hash para ocultar la contraseña
                    $hashed_password = password_hash($postData['password'], PASSWORD_DEFAULT);
                    $user->password = $hashed_password;
                    $user->save();
                
                    $responseMessage = 'User successfully created';
            } catch(\Exception $e){
                $responseMessage = $e->getMessage();
            }  

        }
    
        return $this->renderHTML('addUser.twig', [
            'responseMessage' => $responseMessage,
        ]);
    }


}