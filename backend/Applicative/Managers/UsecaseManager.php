<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class UsecaseManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Usecase", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("Usecase", $id);
    }
    /**
     * Ajoute un item dont on a saisi le nom en parametre
     * @param string $name //nom de l'item
     * @return Response $response // reponse de la requete
     */
    public static function Put($name)
    {
        $item = new Usecase(null);
        $item->setName($name);
        return ModelManager::Put($item);
    }
    /**
     * Edite un item dont on a saisi le nom et l'id en parametre
     * @param string $name //nom de l'item
     * @param $id // identifiant de l'item
     * @return Response $response // reponse de la requete
     */
    public static function Patch($id, $name)
    {
        $item = UsecaseManager::Get($id);
        $item->setName($name);
        ModelManager::Patch($id, $item);
    }
    /**
     * Supprime l'item dont on a saisi l'id en parametre
     * @param $int id //identifiant de l'item
     * @return Response $response // reponse de la requete
     */
    public static function Delete($id)
    {
        ModelManager::Delete("Usecase", $id);
    }
}