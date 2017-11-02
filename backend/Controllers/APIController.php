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
                $data = APIController::GetAll($manager, $params);
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

    private static function GetAll($manager, $data)
    {
        $filters = "";
        if(isset($data["\$filter"]))
        {
            $filters = $data["\$filter"];
        }

        if(isset($data["\$top"]))
        {
            if(is_numeric($data["\$top"]) == false)
                throw new Exception("L'indice de départ n'est pas valide", "BadArgument");
            $top = intval($data["\$top"]);
            $filters .= " and id ge ".$top;

            if(isset($data["\$skip"]))
            {
                if(is_numeric($data["\$skip"]) == false)
                    throw new Exception("L'indice de longueur n'est pas valide", "BadArgument");
                $skip = $top + intval($data["\$skip"]);
                $filters .= " and id lt ".$skip;
            }
        }
        return $manager::GetAll($filters);
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
