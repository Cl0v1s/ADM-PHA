<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class UsecaseManager implements IModelManager
{
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Usecase", $filters);
    }

    public static function Get($id)
    {
        $usecase = ModelManager::Get("Usecase", $id);
        if($usecase == null)
            return null;
        $links = Tool_UsecaseManager::GetAll("Usecase_id eq ".$usecase->Id());
        $tools = array();
        foreach($links as $link)
        {
            $tool = ToolManager::Get($link->getToolId());
            if($tool == null)
                continue;
            array_push($tools, $tool);
        }
        $usecase = get_object_vars($usecase);
        $usecase["tools"] = $tools;
        return $usecase;
    }

    public static function Put($name)
    {
        $item = new Usecase(null);
        $item->setName($name);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $name)
    {
        $item = UsecaseManager::Get($id);
        $item->setName($name);
        ModelManager::Patch($id, $item);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Usecase", $id);
    }
}