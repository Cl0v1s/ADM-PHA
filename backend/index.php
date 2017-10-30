<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'vendor/autoload.php';
include_once 'Core/Engine.php';
include_once 'Configuration.php';
include_once 'Controllers/APIController.php';

/**
 * Created by PhpStorm.
 * User: clovis
 * Date: 22/01/17
 * Time: 16:12
 */

Engine::$DEBUG = true;
date_default_timezone_set ("Europe/Paris");
Engine::Instance()->setPersistence(new DatabaseStorage(Configuration::$DB_hostname, Configuration::$DB_name, Configuration::$DB_username, Configuration::$DB_password));

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$app = new \Slim\App($config);


// Ajout du middleware
$app->add(function(Request $request, Response $response, $next){
    Controller::routeHandler($request, $response, $next);
});

// Définition des routes

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les utilisateurs

$app->any('/v1.0/user', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste
    }

    return $response;
});

$app->any('/v1.0/user/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if ($request->isGet()) {
        //TODO: retourne l'item

    } else if ($request->isDelete()) {
        //TODO: supprime l'item
    } else if ($request->isPatch()) {
        //TODO: on met à jour l'item
    }


    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les AT/DM

$app->any('/v1.0/tool', function (Request $request, Response $response) {
    if ($request->isGet()) {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/tool/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});


/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Résidents

$app->any('/v1.0/resident', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste
    }

    return $response;
});

$app->any('/v1.0/resident/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Etablissements

$app->any('/v1.0/establishment', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/establishments/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les compensations

$app->any('/v1.0/compensation', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/compensation/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});


/////////////////////////////////////////////////////////////////////////////////////////////////
// Les cas d'usage

$app->any('/v1.0/usecase', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/usecase/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les handicaps

$app->any('/v1.0/handicap', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/handicap/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les User_Establishment

$app->any('/v1.0/user_establishment_link', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/user_establishment_link/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les User_Resident

$app->any('/v1.0/user_resident_link', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/user_resident_link/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Tool Resident

$app->any('/v1.0/tool_resident_link', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/tool_resident_link/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les tool handicap

$app->any('/v1.0/tool_handicap_link', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/tool_handicap_link/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Tool_compensation

$app->any('/v1.0/tool_compensation_link', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/tool_compensation_link/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Tool Usecase

$app->any('/v1.0/tool_usecase_link', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

    }

    return $response;
});

$app->any('/v1.0/tool_usecase_link/{id}', function(Request $request, Response $response, $args)
{
    $id = $args["id"];
    if($request->isGet())
    {
        //TODO: retourne l'item

    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
    }
    else if($request->isPut())
    {
        //TODO: on ajoute
    }

    return $response;
});

$app->run();

