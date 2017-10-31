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



}