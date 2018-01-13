<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 14:29
 */

class User_ResidentManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("User_Resident", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("User_Resident", $id);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("User_Resident", $id);
    }
    /**
     * Ajoute un item
     * @param int $User_id //identifiant de l'user
     * @param int $Resident_id //identifiant du resident
     * @return Response $response // reponse de la requete
     */
    public static function Put($User_id, $Resident_id)
    {
        $item = new User_Resident(null);
        $item->setUserId($User_id);
        $item->setResidentId($Resident_id);
        return ModelManager::Put($item);
    }
}