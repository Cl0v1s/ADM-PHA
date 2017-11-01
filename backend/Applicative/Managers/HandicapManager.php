<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class HandicapManager implements IModelManager
{
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Handicap", $filters);
    }

    public static function Get($id)
    {
        return ModelManager::Get("Handicap", $id);
    }

    public static function Put($name)
    {
        $item = new Handicap(null);
        $item->setName($name);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $name)
    {
        $item = HandicapManager::Get($id);
        $item->setName($name);
        ModelManager::Patch($id, $item);
    }

    public static function Delete( $id)
    {
        ModelManager::Delete("Handicap", $id);
    }
}