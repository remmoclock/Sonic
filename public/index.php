<?php

require_once '../vendor/autoload.php';

use \App\Controllers\MainController;
use \App\Controllers\CharactersController;
use \App\Controllers\TypeController;
use \App\Controllers\UserController;

//ON DEMARRE LA SESSION
//On peut stocker des variables dans $_SESSION
session_start();


$router = new AltoRouter() ;

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
}
// sinon
else {
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}


$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => MainController::class,
    ],
    'main-home',
);

$router->map(
    'GET',
    '/author',
    [
        'method' => 'author',
        'controller' => MainController::class,
    ],
    'main-author' ,
);

$router->map(
    'GET',
    '/type',
    [
        'method' => 'type',
        'controller' => TypeController::class,
    ],
    'type-type' ,
);


$router->map(
    'GET',
    '/characters',
    [
        'method' => 'characters',
        'controller' => CharactersController::class,
    ],
    'characters-characters' ,
);

$router->map(
    'GET',
    '/characterAdd',
    [
        'method' => 'characterAdd',
        'controller' => CharactersController::class,
    ],
    'characters-characterAdd' ,
);

$router->map(
    'POST',
    '/characterAdd',
    [
        'method' => 'characterCreate',
        'controller' => CharactersController::class,
    ],
    'characters-characterCreate' ,
);


$router->map(
    'GET',
    '/charactersDelete/[i:id]',
    [
        'method' => 'charactersDelete',
        'controller' => CharactersController::class,
    ],
    'characters-charactersDelete' ,
);

$router->map(
    'GET',
    '/charactersEdit/[i:id]',
    [
        'method' => 'charactersEdit',
        'controller' => CharactersController::class,
    ],
    'characters-charactersEdit' ,
);


$router->map(
    'POST',
    '/charactersEdit/[i:id]',
    [
        'method' => 'charactersUpdate',
        'controller' => CharactersController::class,
    ],
    'characters-charactersUpdate' ,
);



$router->map(
    'GET',
    '/login',
    [
        'method' => 'loginForm',
        'controller' => UserController::class,
    ],
    'usercontroller-loginForm' ,
);

$router->map(
    'POST',
    '/login',
    [
        'method' => 'login',
        'controller' => UserController::class,
    ],
    'usercontroller-login' ,
);


//=============================================================================
//Super sale c'était pour aller vite et ne pas complexifier
//On n'est pas authentifié , on instancie un UserController et on appelle la méthode pour a
//=============================================================================
if(!array_key_exists('user', $_SESSION) && !array_key_exists('email', $_POST)) {
    $controller = new UserController();
    $controller->loginForm();
    exit();
}
//=============================================================================







/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();

