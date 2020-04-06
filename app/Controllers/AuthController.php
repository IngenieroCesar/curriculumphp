<?php 

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController{

    public function getLogin (){
        return $this->renderHTML('login.twig');
    }

    public function postLogin($request){
        $postData = $request->getParsedBody() ;
        $responseMessage = null;

        //Validation here

        $user = User::where('name', $postData['loginName'])->orWhere('email', $postData['loginName'])->first();

        if($user){
            if(\password_verify($postData['password'], $user->password)){
                $_SESSION['userId'] = $user->id;
                return new RedirectResponse('/admin');
            } else {
                $responseMessage = 'User or Password incorrect';
            }
        }else {
            $responseMessage = 'User or Password incorrect';
        }

        return $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage,
        ]);

    }

    public function getLogout (){
        unset($_SESSION['userId']);
        return $this->renderHTML('login.twig');
    }
}