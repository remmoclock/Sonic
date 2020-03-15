<?php

namespace App\Controllers;


use App\Models\User;

// Classe gérant les erreurs (404, 403)
class UserController extends CoreController {
    
    public function login() {
        //dump($_POST);

        $emailSaisi = filter_input(INPUT_POST, 'email');
        $passwordSaisi = filter_input(INPUT_POST, 'password');

        //on récupère un user via son email
        $user = User::findByEmail($emailSaisi);

        //dump($user);

        //si l'utilisateur existe
        if($user) {
            //on vérifie si le mot de passe saisi correspond au mot de passe enregistré dans la bdd

            if($user->getPassword() == $passwordSaisi) {
                //si le mot de passe est correct on enregistre en session $user

                $_SESSION['user'] = $user;

                header('Location: '.$this->router->generate('main-home'));
                return; //on sort de la méthode
            }
            else {
                header('Location: '.$this->router->generate('usercontroller-loginForm'));
            }
        }
        else {
            header('Location: '.$this->router->generate('usercontroller-loginForm'));
        }
    }


    public function loginForm()
    {
        $router = $this->router;
        include(__DIR__.'/../views/user/login.tpl.php');
    }
}
