<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class ToolManager implements IModelManager
{
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Tool", $filters);
    }

    public static function Get($id)
    {
        return ModelManager::Get("Tool", $id);
    }

    public static function Put($name, $description, $autonomy = null, $guide = null, $invasive = null, $provider = null, $advantages = null, $price = null, $refund = null)
    {
        $item = new Tool(null);
        $item->setName($name);
        $item->setDescription($description);
        $item->setAutonomy($autonomy);
        $item->setGuide($guide);
        $item->setInvasive($invasive);
        $item->setProvider($provider);
        $item->setAdvantages($advantages);
        $item->setPrice($price);
        $item->setRefund($refund);
        return ModelManager::Put($item);
    }

    public static function Patch($id,$name, $description, $autonomy = null, $guide = null, $invasive = null, $provider = null, $advantages = null, $price = null, $refund = null)
    {
        $item = ToolManager::Get($id);
        $item->setName($name);
        $item->setDescription($description);
        $item->setAutonomy($autonomy);
        $item->setGuide($guide);
        $item->setInvasive($invasive);
        $item->setProvider($provider);
        $item->setAdvantages($advantages);
        $item->setPrice($price);
        $item->setRefund($refund);
        ModelManager::Patch($id, $item);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("Tool", $id);
    }
}