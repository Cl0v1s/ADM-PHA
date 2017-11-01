<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:12
 */

class Tool_HandicapManager implements IModelManager
{

    public static function GetAll()
    {
        return ModelManager::GetAll("Tool_Handicap");
    }

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