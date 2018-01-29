<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

  /**
  * Classe du modèle correspondant aux liens entre dispositifs et résidents
  **/
class Tool_Resident extends StorageItem
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
    public $Resident_id;

    /**
     * @Word
     * @Size(min=1, max=1000)
     */
    public $progress;

    /**
     * @Word
     * @Size(min=1, max=1000)
     */
    public $anxiety;


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
    public function getResidentId()
    {
        return $this->Resident_id;
    }

    /**
     * @return mixed
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * @param mixed $progress
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;
        $this->checkIntegrity("progress");
    }

    /**
     * @return mixed
     */
    public function getAnxiety()
    {
        return $this->anxiety;
    }

    /**
     * @param mixed $anxiety
     */
    public function setAnxiety($anxiety)
    {
        $this->anxiety = $anxiety;
        $this->checkIntegrity("anxiety");

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
     * @param mixed $Resident_id
     */
    public function setResidentId($Resident_id)
    {
        $this->Resident_id = $Resident_id;
        $this->checkIntegrity("Resident_id");
    }





}