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
        $resident =  ModelManager::Get("Resident", $id);
        if($resident == null)
            return null;
        $resident = get_object_vars($resident);
    
        // Récupération des ats et dms
        $tool_residents = Tool_ResidentManager::GetAll("Resident_id eq "+$id);
        $ats = array();
        $dms = array();
        foreach($tool_residents as $link)
        {
            $tool = Tool::Get($link->getToolId());
            if($tool == null)
                continue;
            if($tool->getType() == 0)
                array_push($dms, $tool);
            else if($tool->getType() == 1)
                array_push($ats, $tool);
        }
        $resident["ats"] = $ats;
        $resident["dms"] = $dms;

        // Récupération s des users
        $user_residents = User_ResidentManager::GetAll("Resident_id eq "+$id);
        $perso = array();
        $pro = array();
        foreach($user_residents as $link)
        {
            $user = Tool::Get($link->getUserId());
            if($user == null)
                continue;
            if($user->getGroup() == 0)
                array_push($perso, $user);
            else if($user->getGroup() == 1)
                array_push($pro, $user);   
        }
        $resident["perso"] = $perso;
        $resdient["pro"] = $pro;

        return $resident;
    }

    public static function Put($lastname, $firstname, $age, $pathologies, $autonomy, $Establishment_id, $healplan = null, $picture = null)
    {
        $item = new Resident(null);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setAge($age);
        $item->setPathologies($pathologies);
        $item->setAutonomy($autonomy);
        $item->setEstablishmentId($Establishment_id);
        $item->setHealplan($healplan);
        $item->setPicture($picture);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $lastname, $firstname, $age, $pathologies, $autonomy, $Establishment_id, $healplan = null, $picture = null)
    {
        $item = ResidentManager::Get($id);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setAge($age);
        $item->setPathologies($pathologies);
        $item->setAutonomy($autonomy);
        $item->setEstablishmentId($Establishment_id);
        $item->setHealplan($healplan);
        $item->setPicture($picture);        
        ModelManager::Patch($id, $item);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Resident", $id);
    }
}