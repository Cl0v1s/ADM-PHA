<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './../vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: clovis
 * Date: 22/01/17
 * Time: 16:15
 */
class APIController extends Controller
{
    /**
     * @param $class
     * @param $operation
     * @param array $params
     * @param Response $response
     * @return Response
     */
    public static function Execute($class, $operation,array $params, Response $response)
    {
        $manager = $class."Manager";
        if(class_exists($manager) == false)
            return $response->withStatus(404);

        if(method_exists($manager, $operation) == false)
            return $response->withStatus(405);

        $data = null;
        switch ($operation)
        {
            case "GetAll":
                $data = APIController::GetAll($manager);
                break;
            case "Get":
                $data = APIController::Get($manager,$params["id"]);
                break;
            case "Put":
                $data = APIController::Put($manager, $params);
                break;
            case "Patch":
                APIController::Patch($manager, $params["id"], $params);
                break;
            case "Delete":
                APIController::Delete($manager, $params["id"]);
                break;
        }

        $response = $response->getBody()->write(json_encode($data));

        return $response;
    }

    private static function GetAll($manager)
    {
        return $manager::GetAll();
    }

    private static function Get($manager, $id)
    {
        return $manager::Get($id);
    }

    private static function Delete($manager, $id)
    {
        $manager::Delete($id);
    }

    private static function Put($manager, $data)
    {
        $f = new ReflectionFunction($manager."::Put");
        $params = array();
        foreach ($f->getParameters() as $param) {
            if(isset($data[$param->name]) == false)
                throw new Exception("Les arguments fournis sont incorrects", "BadArgument");
            $params[$param->name] = $data[$param->name];
        }
        $manager::Put(...$params);
    }

    private static function Patch($manager, $id, $data)
    {
        $f = new ReflectionFunction($manager."::Put");
        $params = array();
        foreach ($f->getParameters() as $param) {
            if(isset($data[$param->name]) == false)
                throw new Exception("Les arguments fournis sont incorrects", "BadArgument");
            $params[$param->name] = $data[$param->name];
        }
        $manager::Patch($id, ...$params);
    }
}
