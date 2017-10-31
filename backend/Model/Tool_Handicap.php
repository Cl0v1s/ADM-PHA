<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

class Tool_Handicap extends StorageItem
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
    public $Handicap_id;

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
    public function getHandicapId()
    {
        return $this->Handicap_id;
    }


}