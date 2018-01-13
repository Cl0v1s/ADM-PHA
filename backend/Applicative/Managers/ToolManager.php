<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class ToolManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Tool", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("Tool", $id);
    }
    /**
     * Ajoute un item
     * @param string name //nom de l'item
     * @param string description
     * @param string type
     * @param picture
     * @param string autonomy
     * @param string guide
     * @param string invasive
     * @param string constructor
     * @param string advantages
     * @param int price
     * @param string refund
     * @param string humans
     * @return Response $response // reponse de la requete
     */
    public static function Put($name, $description, $type, $picture = null, $autonomy = null, $guide = null, $invasive = null, $constructor = null, $advantages = null, $price = null, $refund = null, $humans = null)
    {
        $item = new Tool(null);
        $item->setName($name);
        $item->setPicture($picture);
        $item->setDescription($description);
        $item->setAutonomy($autonomy);
        $item->setGuide($guide);
        $item->setInvasive($invasive);
        $item->setConstructor($constructor);
        $item->setAdvantages($advantages);
        $item->setPrice($price);
        $item->setRefund($refund);
        $item->setHumans($humans);
        $item->setType($type);
        return ModelManager::Put($item);
    }
    /**
     * Edite un item
     * @param string name //nom de l'item
     * @param string description
     * @param string type
     * @param picture
     * @param string autonomy
     * @param string guide
     * @param string invasive
     * @param string constructor
     * @param string advantages
     * @param int price
     * @param string refund
     * @param string humans
     * @return Response $response // reponse de la requete
     */
    public static function Patch($id, $name, $description, $type, $picture, $autonomy = null, $guide = null, $invasive = null, $constructor = null, $advantages = null, $price = null, $refund = null, $humans = null)
    {
        $item = ToolManager::Get($id);
        $item->setName($name);
        $item->setDescription($description);
        $item->setAutonomy($autonomy);
        $item->setGuide($guide);
        $item->setInvasive($invasive);
        $item->setConstructor($constructor);
        $item->setAdvantages($advantages);
        $item->setPrice($price);
        $item->setRefund($refund);
        $item->setHumans($humans);
        $item->setType($type);
        $item->setPicture($picture);
        ModelManager::Patch($id, $item);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Tool", $id);
    }
}