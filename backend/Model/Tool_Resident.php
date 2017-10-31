<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 31/10/2017
 * Time: 12:25
 */

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
     * @Word
     * @Size(min=1, max=1000)
     */
    public $comments;

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
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        $this->checkIntegrity("comments");
    }



}