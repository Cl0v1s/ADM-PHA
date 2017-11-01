<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:03
 */

class Tool_CompensationManager implements IModelManager
{

    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Tool_Compensation");
    }

    public static function Get($id)
    {
        return ModelManager::Get("Tool_Compensation", $id);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Tool_Compensation", $id);
    }

    public static function Put($Tool_id, $Compensation_id)
    {
        $item = new Tool_Compensation(null);
        $item->setCompensationId($Compensation_id);
        $item->setToolId($Tool_id);
        return ModelManager::Put($item);
    }
}