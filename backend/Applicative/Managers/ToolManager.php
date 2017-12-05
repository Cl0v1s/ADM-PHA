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
        $tool = ModelManager::Get("Tool", $id);
        if($tool == null)
            return null;
        $comments = CommentManager::GetAll("Tool_id eq ".$tool->Id());
        $tool = get_object_vars($tool);
        $tool["comments"] = $comments;
        return $tool;
    }

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