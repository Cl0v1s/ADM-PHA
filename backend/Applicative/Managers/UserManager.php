<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:34
 */

class UserManager implements IModelManager
{
    /**
     * Selectionne tous les items avec une restriction
     * @param string $filters //restriction exigée par l'utilisateur
     * @return Response $response // reponse de la requete
     */
    public static function GetAll($filters)
    {
        return ModelManager::GetAll("User", $filters);
    }
    /**
     * Selectionne l'item dont on a saisi l'id en parametre
     * @param int $id //identifiant de l'item que l'on veut selectionner
     * @return Response $response // reponse de la requete
     */
    public static function Get($id)
    {
        return ModelManager::Get("User", $id);
    }
    /**
     * Ajoute un item
     * @param string $lastname //nom
     * @param string $firstname //prenom
     * @param string $mail adresse email
     * @param int $phone // numero de telephone
     * @param string $group groupe privilèges 0: personnel médical 1: professionnel 2: admin
     * @param string $job Métier de l'utilisateur 
     * @return Response $response // reponse de la requete
     */

    public static function Put($lastname, $firstname, $mail, $phone, $group, $job)
    {
        $item = new User(null);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setMail($mail);
        $item->setPhone($phone);
        $item->setGroup($group);
        $item->setJob($job);
        return ModelManager::Put($item);
    }
    /**
     * Edite un item
     * @param string $lastname //nom
     * @param string $firstname //prenom
     * @param string $mail adresse email
     * @param int $phone // numero de telephone
     * @param string $group groupe privilèges 0: personnel médical 1: professionnel 2: admin
     * @param string $job Métier de l'utilisateur 
     */
    public static function Patch($id, $lastname, $firstname, $mail, $phone, $group, $job)
    {
        $item = UserManager::Get($id);
        $item->setLastname($lastname);
        $item->setFirstname($firstname);
        $item->setMail($mail);
        $item->setPhone($phone);
        $item->setGroup($group);
        $item->setJob($job);
        ModelManager::Patch($id, $item);
    }
    /**
     * Supprime l'item dont on a saisi l'id en parametre
     * @param $int id //identifiant de l'item
     */
    public static function Delete($id)
    {
        ModelManager::Delete("User", $id);
    }
}