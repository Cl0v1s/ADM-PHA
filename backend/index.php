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


// Définition des routes

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les utilisateurs

$app->any('/v1.0/users', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/user/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});


/////////////////////////////////////////////////////////////////////////////////////////////////
// Les AT/DM

$app->any('/v1.0/tools', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/tool/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});


/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Résidents

$app->any('/v1.0/residents', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/resident/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Etablissements

$app->any('/v1.0/establishments', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/establishments/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les compensations

$app->any('/v1.0/compensations', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/compensation/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});


/////////////////////////////////////////////////////////////////////////////////////////////////
// Les cas d'usage

$app->any('/v1.0/usecases', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/usecase/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les handicaps

$app->any('/v1.0/handicaps', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/handicap/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les User_Establishment

$app->any('/v1.0/user_establishment_links', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/user_establishment_link/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les User_Resident

$app->any('/v1.0/user_resident_links', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/user_resident_link/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Tool Resident

$app->any('/v1.0/tool_resident_links', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/tool_resident_link/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les tool handicap

$app->any('/v1.0/tool_handicap_links', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/tool_handicap_link/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Tool_compensation

$app->any('/v1.0/tool_compensation_links', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/tool_compensation_link/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////
// Les Tool Usecase

$app->any('/v1.0/tool_usecase_links', function (Request $request, Response $response) {
    if($request->isGet())
    {
        //TODO: retourne la liste

        return;
    }
});

$app->any('/v1.0/tool_usecase_link/{id}', function(Request $request, Response $response, $args)
{
    if($request->isGet())
    {
        //TODO: retourne l'item

        return;
    }
    else if($request->isDelete())
    {
        //TODO: supprime l'item
        return;
    }
    else if($request->isPatch())
    {
        //TODO: on met à jour l'item
        return;
    }
});

$app->run();

