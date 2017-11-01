<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:25
 */

class User_EstablishmentManager implements IModelManager
{

    public static function GetAll($filters)
    {
        return ModelManager::GetAll("User_Establishment", $filters);
    }

    public static function Get($id)
    {
        return ModelManager::Get("User_Establishment" , $id);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("User_Establishment", $id);
    }

    public static function Put($User_id, $Establishment_id)
    {
        $item = new User_Establishment(null);
        $item->setUserId($User_id);
        $item->setEstablishmentId($Establishment_id);
        return ModelManager::Put($item);
    }
}