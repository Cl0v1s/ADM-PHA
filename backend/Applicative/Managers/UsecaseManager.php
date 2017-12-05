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
        return ModelManager::Get("Usecase", $id);
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