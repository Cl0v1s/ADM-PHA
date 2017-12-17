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
        $results = array();
        foreach($links as $link)
        {
            $link = get_object_vars($link);

            $tool = ToolManager::Get($link["Tool_id"]);
            if($tool == null)
            {
                array_push($results, $link);
                continue;                
            }
            $tool = get_object_vars($tool);
            
            $comments = CommentManager::GetAll("Resident_id eq ".$link["Resident_id"]." and Tool_id eq ".$link["Tool_id"]);
            $tool["comments"] = $comments;

            $link["tool"] = $tool;
            array_push($results, $link);
        }

        return $results;
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