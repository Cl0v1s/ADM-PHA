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
     * @param string description description de l'outil
     * @param string type   type (DM = 0, AT = 1)
     * @param picture Photo de l'outil
     * @param string autonomy Degré d'autonomie
     * @param string guide lien vers le guide d'usage
     * @param string invasive Caractères invasif 
     * @param string constructor Nom du contructoeur
     * @param string advantages Avantages et inconvénients
     * @param int price prix 
     * @param string refund Pourcentage remboursé
     * @param string humans Nombre de personnes nécessaires à la manipulation de l'outil
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
     * @param string description description de l'outil
     * @param string type   type (DM = 0, AT = 1)
     * @param picture Photo de l'outil
     * @param string autonomy Degré d'autonomie
     * @param string guide lien vers le guide d'usage
     * @param string invasive Caractères invasif 
     * @param string constructor Nom du contructoeur
     * @param string advantages Avantages et inconvénients
     * @param int price prix 
     * @param string refund Pourcentage remboursé
     * @param string humans Nombre de personnes nécessaires à la manipulation de l'outil
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
    /**
     * Supprime l'item dont on a saisi l'id en parametre
     * @param $int id //identifiant de l'item
     */
    public static function Delete($id)
    {
        ModelManager::Delete("Tool", $id);
    }
}