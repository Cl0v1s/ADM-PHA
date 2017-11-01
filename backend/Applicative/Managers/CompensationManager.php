<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class CompensationManager implements IModelManager
{
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Compensation", $filters);
    }

    public static function Get($id)
    {
        return ModelManager::Get("Compensation", $id);
    }

    public static function Put($name)
    {
        $item = new Compensation(null);
        $item->setName($name);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $name)
    {
        $item = CompensationManager::Get($id);
        $item->setName($name);
        ModelManager::Patch($id, $item);
    }

    public static function Delete( $id)
    {
        ModelManager::Delete("Compensation", $id);
    }
}