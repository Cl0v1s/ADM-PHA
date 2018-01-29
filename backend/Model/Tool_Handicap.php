<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

  /**
  * Classe du modèle correspondant aux liens entre dispositifs et handicaps
  **/
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

    /**
     * @param mixed $Tool_id
     */
    public function setToolId($Tool_id)
    {
        $this->Tool_id = $Tool_id;
        $this->checkIntegrity("Tool_id");
    }

    /**
     * @param mixed $Handicap_id
     */
    public function setHandicapId($Handicap_id)
    {
        $this->Handicap_id = $Handicap_id;
        $this->checkIntegrity("Handicap_id");
    }


}