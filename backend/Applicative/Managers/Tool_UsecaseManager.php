<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:23
 */

class Tool_UsecaseManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        $links = ModelManager::GetAll("Tool_Usecase", $filters);
        $results = array();
        foreach($links as $link)
        {
            $link = get_object_vars($link);
            $tool = ToolManager::Get($link["Tool_id"]);
            if($tool != null)
                $link["tool"] = $tool;
            array_push($results, $link);
        }
        return $results;
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("Tool_Usecase", $id);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Tool_Usecase", $id);
    }

    public static function Put($Tool_id, $Usecase_id)
    {
        $item = new Tool_Usecase(null);
        $item->setToolId($Tool_id);
        $item->setUsecaseId($Usecase_id);
        return ModelManager::Put($item);
    }

}