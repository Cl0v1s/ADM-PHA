<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:29
 */

class User_ResidentManager implements IModelManager
{

    public static function GetAll()
    {
        return ModelManager::GetAll("User_Resident");
    }

    public static function Get($id)
    {
        return ModelManager::Get("User_Resident", $id);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("User_Resident", $id);
    }

    public static function Put($User_id, $Resident_id)
    {
        $item = new User_Resident(null);
        $item->setUserId($User_id);
        $item->setResidentId($Resident_id);
        return ModelManager::Put($item);
    }
}