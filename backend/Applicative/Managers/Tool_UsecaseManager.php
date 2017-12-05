<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:23
 */

class Tool_UsecaseManager implements IModelManager
{

    public static function GetAll($filters)
    {
        $links = ModelManager::GetAll("Tool_Usecase", $filters);
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