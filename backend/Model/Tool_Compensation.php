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

    /**
     * @param mixed $Tool_id
     */
    public function setToolId($Tool_id)
    {
        $this->Tool_id = $Tool_id;
        $this->checkIntegrity("Tool_id");
    }

    /**
     * @param mixed $Compensation_id
     */
    public function setCompensationId($Compensation_id)
    {
        $this->Compensation_id = $Compensation_id;
        $this->checkIntegrity("Compensation_id");
    }





}