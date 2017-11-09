<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class ResidentManager implements IModelManager
{
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Resident", $filters);
    }

    public static function Get($id)
    {
        return ModelManager::Get("Resident", $id);
    }

    public static function Put($lastname, $firstname, $age, $pathologies, $autonomy, $Establishment_id, $healplan = null)
    {
        $item = new Resident(null);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setAge($age);
        $item->setPathologies($pathologies);
        $item->setAutonomy($autonomy);
        $item->setEstablishmentId($Establishment_id);
        $item->setHealplan($healplan);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $lastname, $firstname, $age, $pathologies, $autonomy, $Establishment_id, $healplan = null)
    {
        $item = ResidentManager::Get($id);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setAge($age);
        $item->setPathologies($pathologies);
        $item->setAutonomy($autonomy);
        $item->setEstablishmentId($Establishment_id);
        $item->setHealplan($healplan);
        ModelManager::Patch($id, $item);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Resident", $id);
    }
}