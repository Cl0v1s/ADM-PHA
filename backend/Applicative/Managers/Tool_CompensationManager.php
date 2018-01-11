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
     * Selectionne tous les items de ce manager
     * @param string $filters
     * @return Response
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Tool_Compensation");
    }
    /**
     * Sélectionne l'item dont on a entré l'id en paramètre
     * @param int $id
     * @return Response
     */
    public static function Get($id)
    {
        return ModelManager::Get("Tool_Compensation", $id);
    }
    /**
     * Supprime l'item dont on a entré l'id en paramètre
     * @param int $id
     * @return Response
     */
    public static function Delete($id)
    {
        ModelManager::Delete("Tool_Compensation", $id);
    }
    /**
     * Ajoute un item dont on a entré l'id en paramètre
     * @param int $Tool_id
     * @param int $Compensation_id
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