<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 13:31
 */

interface IModelManager
{
    public static function GetAll($filters);

    public static function Get($id);

    public static function Delete($id);
}