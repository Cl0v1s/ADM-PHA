<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

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



}