<?php

include_once 'Core/Annotations.php';
include_once 'Core/StorageItem.php';

/**
 * Created by PhpStorm.
 * User: clovis
 * Date: 21/03/17
 * Time: 19:48
 */
class User extends StorageItem
{

    /**
     * @Required
     * @Word
     * @Size(min=1,max=400)
     */
    public $lastname;

    /**
     * @Required
     * @Word
     * @Size(min=1,max=400)
     */
    public $firstname;

    /**
     * @Required
     * @Word
     * @Size(min=1,max=400)
     */
    public $mail;

    /**
     * @Required
     * @Word
     * @Size(min=1,max=400)
     */
    public $phone;

    /**
     * @Required
     * @Numeric
     */
    public $group;

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        $this->checkIntegrity("lastname");
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        $this->checkIntegrity("firstname");
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        $this->checkIntegrity("mail");

    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        $this->checkIntegrity("phone");
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
        $this->checkIntegrity("group");
    }
}
