<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class UserManager
{
    public static function GetAll()
    {
        return ModelManager::GetAll("User");
    }

    public static function Get($id)
    {
        return ModelManager::Get("User", $id);
    }

    public static function Put($lastname, $firstname, $mail, $phone, $group)
    {
        $item = new User(null);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setMail($mail);
        $item->setPhone($phone);
        $item->setGroup($group);
        return ModelManager::Put($item);
    }

    public static function Patch($id, $lastname, $firstname, $mail, $phone, $group)
    {
        $item = UserManager::Get($id);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setMail($mail);
        $item->setPhone($phone);
        $item->setGroup($group);
        ModelManager::Patch($id, $item);
    }

    public static function Delete($id)
    {
        ModelManager::Delete("User", $id);
    }
}