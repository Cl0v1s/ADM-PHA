<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

  /**
  * Classe du modèle correspondant aux liens entre utilisateurs et résidents
  **/
class User_Resident extends StorageItem
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
    public $Resident_id;

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
    public function getResidentId()
    {
        return $this->Resident_id;
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
     * @param mixed $Resident_id
     */
    public function setResidentId($Resident_id)
    {
        $this->Resident_id = $Resident_id;
        $this->checkIntegrity("Resident_id");
    }





}