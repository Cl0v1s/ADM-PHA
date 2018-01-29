<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:03
 */

class Tool_CompensationManager implements IModelManager
{

    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Tool_Compensation");
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("Tool_Compensation", $id);
    }
    /**
     * Supprime l'item dont on a entré l'id en paramètre
     * @param int $id // identifiant de l'item
     */
    public static function Delete($id)
    {
        ModelManager::Delete("Tool_Compensation", $id);
    }
    /**
     * Ajoute un item dont on a entré l'id en paramètre
     * @param int $Tool_id //identifiant du tool
     * @param int $Compensation_id //identifiant de compensation
     * @return Response
     */
    public static function Put($Tool_id, $Compensation_id)
    {
        $item = new Tool_Compensation(null);
        $item->setCompensationId($Compensation_id);
        $item->setToolId($Tool_id);
        return ModelManager::Put($item);
    }
}