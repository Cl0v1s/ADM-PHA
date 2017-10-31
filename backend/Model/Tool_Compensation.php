<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

class Tool_Compensation extends StorageItem
{
    /**
     * @Required
     * @Numeric
     */
    public $Tool_id;

    /**
     * @Required
     * @Numeric
     */
    public $Compensation_id;

    /**
     * @return mixed
     */
    public function getToolId()
    {
        return $this->Tool_id;
    }

    /**
     * @return mixed
     */
    public function getCompensationId()
    {
        return $this->Compensation_id;
    }




}