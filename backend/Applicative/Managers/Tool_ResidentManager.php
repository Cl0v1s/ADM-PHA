<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:15
 */

class Tool_ResidentManager implements IModelManager
{

    public static function GetAll($filters)
    {
        $links = ModelManager::GetAll("Tool_Resident", $filters);
        $links = get_object_vars($links);
        foreach($links as $link)
        {
            $tool = ToolManager::Get($link["Tool_id"]);
            if($tool != null)
                $link["tool"] = $tool;
        }
        return $links;
    }

    public static function Get($id)
    {
        return ModelManager::Get("Tool_Resident", $id);
    }

    public static function Delete($id)
    {
        return ModelManager::Delete("Tool_Resident", $id);
    }

    public static function Put($Tool_id, $Resident_id, $progress = null, $anxiety = null)
    {
        $item = new Tool_Resident(null);
        $item->setToolId($Tool_id);
        $item->setResidentId($Resident_id);
        $item->setProgress($progress);
        $item->setAnxiety($anxiety);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $progress = null, $anxiety = null)
    {
        $item = Tool_ResidentManager::Get($id);
        $item->setProgress($progress);
        $item->setAnxiety($anxiety);
        ModelManager::Patch($id, $item);
    }
}