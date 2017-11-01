<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

class Tool_Usecase extends StorageItem
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
    public $Usecase_id;

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
    public function getUsecaseId()
    {
        return $this->Usecase_id;
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
     * @param mixed $Usecase_id
     */
    public function setUsecaseId($Usecase_id)
    {
        $this->Usecase_id = $Usecase_id;
        $this->checkIntegrity("Usecase_id");
    }





}