<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

interface ModelManager
{
    public static function GetAll();

    public static function Get($id);

    public static function Put($id, $user);

    public static function Patch($id, $user);

    public static function Delete($id);
}