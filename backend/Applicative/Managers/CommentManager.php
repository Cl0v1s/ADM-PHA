<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class CommentManager implements IModelManager
{
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("Comment", $filters);
    }

    public static function Get($id)
    {
        return ModelManager::Get("Comment", $id);
    }

    public static function Put($content, $User_id, $Tool_Resident_id)
    {
        $item = new Comment(null);
        $item->setContent($content);
        $item->setUserId($User_id);
        $item->setToolResidentId($Tool_Resident_id);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $content, $User_id, $Tool_Resident_id)
    {
        $item = CommentManager::Get($id);
        $item->setContent($content);
        $item->setUserId($User_id);
        $item->setToolResidentId($Tool_Resident_id);
        ModelManager::Patch($id, $item);
    }

    public static function Delete( $id)
    {
        ModelManager::Delete("Comment", $id);
    }
}