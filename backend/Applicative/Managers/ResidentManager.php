<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class ResidentManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Resident", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        $resident =  ModelManager::Get("Resident", $id);
        if($resident == null)
            return null;
        $resident = get_object_vars($resident);
    
        // Récupération des ats et dms
        $tool_residents = Tool_ResidentManager::GetAll("Resident_id eq ".$id);
        $ats = array();
        $dms = array();
        foreach($tool_residents as $link)
        {
            $tool = ToolManager::Get($link["Tool_id"]);
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
        $user_residents = User_ResidentManager::GetAll("Resident_id eq ".$id);
        $perso = array();
        $pro = array();
        foreach($user_residents as $link)
        {
            $user = UserManager::Get($link->getUserId());
            if($user == null)
                continue;
            if($user->getGroup() == 0)
                array_push($perso, $user);
            else if($user->getGroup() == 1)
                array_push($pro, $user);   
        }
        $resident["perso"] = $perso;
        $resident["pro"] = $pro;

        return $resident;
    }
    /**
     * Ajoute un item dont on a saisi tous les parametres
     * @param string $lastname //nom
     * @param string $firstname //prenom
     * @param int $age //age
     * @param string $pathologies //pathologies
     * @param string $autonomy //autonomie
     * @param int $Establishment_id // identifiant de son etablissement
     * @param healpan Plan de soin 
     * @param picture Photo de profil
     * @return Response $response // reponse de la requete
     */

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
    /**
     * Edite un item dont on a saisi tous les parametres
     * @param string $lastname //nom
     * @param string $firstname //prenom
     * @param int $age //age
     * @param string $pathologies //pathologies
     * @param string $autonomy //autonomie
     * @param int $Establishment_id // identifiant de son etablissement
     * @param healpan
     * @param picture
     */
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
    /**
     * Supprime l'item dont on a saisi l'id en parametre
     * @param $int id //identifiant de l'item
     */
    public static function Delete($id)
    {
        ModelManager::Delete("Resident", $id);
    }
}