<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class EstablishmentManager implements IModelManager
{
    public static function GetAll()
    {
        return ModelManager::GetAll("Establishment");
    }

    public static function Get($id)
    {
        return ModelManager::Get("Establishment", $id);
    }

    public static function Put($name)
    {
        $item = new Establishment(null);
        $item->setName($name);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $name)
    {
        $item = EstablishmentManager::Get($id);
        $item->setName($name);
        ModelManager::Patch($id, $item);
    }

    public static function Delete( $id)
    {
        ModelManager::Delete("Establishment", $id);
    }
}