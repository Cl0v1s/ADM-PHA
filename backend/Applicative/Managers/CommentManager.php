<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class CommentManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Comment", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("Comment", $id);
    }
    /**
     * Ajoute un item dont on a saisi l'id en parametre
     * @param string $content
     * @param int $User_id
     * @param int $Resident_id
     * @param int $Tool_id
     * @param int $id //identifiant de l'item que l'on veut ajouter
     * @return Response $response // reponse de la requete
     */
    public static function Put($content, $User_id, $Resident_id, $Tool_id)
    {
        $item = new Comment(null);
        $item->setContent($content);
        $item->setUserId($User_id);
        $item->setToolId($Tool_id);
        $item->setResidentId($Resident_id);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $content, $User_id, $Resident_id, $Tool_id)
    {
        $item = CommentManager::Get($id);
        $item->setContent($content);
        $item->setUserId($User_id);
        $item->setToolId($Tool_id);
        $item->setResidentId($Resident_id);
        ModelManager::Patch($id, $item);
    }

    public static function Delete( $id)
    {
        ModelManager::Delete("Comment", $id);
    }
}

