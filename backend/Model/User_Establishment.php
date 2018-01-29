<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

  /**
  * Classe du modèle correspondant aux liens entre utilisateur et établissement
  **/
class User_Establishment extends StorageItem
{
    /**
     * @Required
     * @Numeric
     */
    public $User_id;

    /**
     * @Required
     * @Numeric
     */
    public $Establishment_id;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->User_id;
    }

    /**
     * @return mixed
     */
    public function getEstablishmentId()
    {
        return $this->Establishment_id;
    }

    /**
     * @param mixed $User_id
     */
    public function setUserId($User_id)
    {
        $this->User_id = $User_id;
        $this->checkIntegrity("User_id");
    }

    /**
     * @param mixed $Establishment_id
     */
    public function setEstablishmentId($Establishment_id)
    {
        $this->Establishment_id = $Establishment_id;
        $this->checkIntegrity("Establishment_id");
    }


}