<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class ModelManager
{
    public static function GetAll($class)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $items = null;
        $storage->findAll("Establishment", $items, null);
        return $items;
    }

    public static function Get($class, $id)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $item = new $class($storage, $id);
        $item = $storage->find($item);
        return $item;
    }

    public static function Put(StorageItem $item)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $item->setStorage($storage);
        $storage->persist($item);
        $storage->flush();
        return $item->Id();
    }

    public static function Patch($id, StorageItem $item)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $item->setStorage($item);
        $item->id = $id;
        $storage->persist($item, StorageState::ToUpdate);
        $storage->flush();
    }

    public static function Delete($class, $id)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $item = new $class($storage, $id);
        $item = $storage->find($item);
        return $item;
    }
}