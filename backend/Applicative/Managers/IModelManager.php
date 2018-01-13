<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 01/11/2017
 * Time: 13:31
 */

interface IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters);
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id);

    public static function Delete($id);
}