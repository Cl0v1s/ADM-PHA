<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class ModelManager
{

    private static function buildSQLWhere($filters)
    {
        $filters = str_replace("*", "%", $filters);
        $where = "";
        $andor = null;
        preg_match_all('/(and)|(or)/', $filters, $andor);

        $filters = preg_split('/(and)|(or)/', $filters);
        for($i = 0; $i < count($filters);  $i++)
        {
            // Gestion de l'égalité
            if(strpos($filters[$i], "%") !== false)
            {
                $filters[$i] = str_replace("eq", "LIKE", $filters[$i]);
            }
            else
                $filters[$i] = str_replace("eq", "=", $filters[$i]);

            // Gestion de la différence
            if(strpos($filters[$i], "ne") !== false)
            {
                if(strpos($filters[$i], "%") !== false)
                {
                    $filters[$i] = str_replace("ne", "LIKE", $filters[$i]);
                }
                else
                    $filters[$i] = str_replace("ne", "=", $filters[$i]);

                $filters[$i] = "NOT ".$filters[$i];
            }
            // Gestion gt
            $filters[$i] = str_replace("gt", ">", $filters[$i]);

            // Gestion ge
            $filters[$i] = str_replace("ge", ">=", $filters[$i]);

            // Gestion lt
            $filters[$i] = str_replace("lt", "<", $filters[$i]);

            // Gestion le
            $filters[$i] = str_replace("le", "<=", $filters[$i]);

            $where .= $filters[$i];
            if(isset($andor[0][$i]) == true)
                $where .= $andor[0][$i];
        }

        return $where;
    }


    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($class, $filters)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $items = null;
        $filters = ModelManager::buildSQLWhere($filters);
        $storage->findAll($class, $items, $filters);
        return $items;
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($class, $id)
    {
        $storage = Engine::Instance()->getPersistence("DatabaseStorage");
        $item = new $class($storage, $id);
        $item = $storage->find($item);
        return $item;
    }
    /**
     * Ajoute un item dont on a saisi le nom en parametre
     * @param string $item //nom de l'item
     * @return Response $response // reponse de la requete
     */

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