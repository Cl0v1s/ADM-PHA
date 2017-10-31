<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

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


}