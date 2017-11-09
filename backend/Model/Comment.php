<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 30/10/2017
 * Time: 19:53
 */

class Comment extends StorageItem
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
    public $Tool_Resident_id;


    /**
     * @Required
     * @Word
     * @Size(min=1, max=1500)
     */
    public $content;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->User_id;
    }

    /**
     * @param mixed $User_id
     */
    public function setUserId($User_id)
    {
        $this->User_id = $User_id;
        $this->checkIntegrity("User_id");
    }

    /**
     * @return mixed
     */
    public function getToolResidentId()
    {
        return $this->Tool_Resident_id;
    }

    /**
     * @param mixed $Tool_Resident_id
     */
    public function setToolResidentId($Tool_Resident_id)
    {
        $this->Tool_Resident_id = $Tool_Resident_id;
        $this->checkIntegrity("Tool_Resident_id");
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
        $this->checkIntegrity("content");
    }


}