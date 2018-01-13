<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:12
 */

class Tool_HandicapManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Tool_Handicap", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("Tool_Handicap", $id);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Tool_Handicap", $id);
    }

    public static function Put($Tool_id, $Handicap_id)
    {
        $item = new Tool_Handicap(null);
        $item->setToolId($Tool_id);
        $item->setHandicapId($Handicap_id);
        return ModelManager::Put($item);
    }
}