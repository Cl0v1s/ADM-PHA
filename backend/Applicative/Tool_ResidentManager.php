<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:15
 */

class Tool_ResidentManager implements IModelManager
{

    public static function GetAll()
    {
        return ModelManager::GetAll("Tool_Resident");
    }

    public static function Get($id)
    {
        return ModelManager::Get("Tool_Resident", $id);
    }

    public static function Delete($id)
    {
        return ModelManager::Delete("Tool_Resident", $id);
    }

    public static function Put($Tool_id, $Resident_id, $progress = null, $anxiety = null, $comments = null)
    {
        $item = new Tool_Resident(null);
        $item->setToolId($Tool_id);
        $item->setResidentId($Resident_id);
        $item->setProgress($progress);
        $item->setAnxiety($anxiety);
        $item->setComments($comments);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $progress = null, $anxiety = null, $comments = null)
    {
        $item = Tool_ResidentManager::Get($id);
        $item->setProgress($progress);
        $item->setAnxiety($anxiety);
        $item->setComments($comments);
        ModelManager::Patch($id, $item);
    }
}