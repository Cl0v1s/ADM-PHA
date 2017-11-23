<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 30/10/2017
 * Time: 19:49
 */

class Resident extends StorageItem
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
     * @Numeric
     */
    public $age;

    /**
     * @Required
     * @Word
     * @Size(min=1,max=1000)
     */
    public $pathologies;

    /**
     * @Required
     * @Word
     * @Size(min=1,max=1000)
     */
    public $autonomy;

    /**
     * @Required
     * @Numeric
     */
    public $Establishment_id;

    /**
     * @Word
     * @Size(min=1, max=3000)
     */
    public $healplan;

    /**
     * @Word
     * @Size(min=1, max=400)
     */
    public $picture;

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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
        $this->checkIntegrity("age");

    }

    /**
     * @return mixed
     */
    public function getPathologies()
    {
        return $this->pathologies;
    }

    /**
     * @param mixed $pathologies
     */
    public function setPathologies($pathologies)
    {
        $this->pathologies = $pathologies;
        $this->checkIntegrity("pathologies");

    }

    /**
     * @return mixed
     */
    public function getAutonomy()
    {
        return $this->autonomy;
    }

    /**
     * @param mixed $autonomy
     */
    public function setAutonomy($autonomy)
    {
        $this->autonomy = $autonomy;
        $this->checkIntegrity("autonomy");

    }

    /**
     * @return mixed
     */
    public function getEstablishmentId()
    {
        return $this->Establishment_id;
    }

    /**
     * @param mixed $Establishment_id
     */
    public function setEstablishmentId($Establishment_id)
    {
        $this->Establishment_id = $Establishment_id;
        $this->checkIntegrity("Establishment_id");
    }

    /**
     * @return mixed
     */
    public function getHealplan()
    {
        return $this->healplan;
    }

    /**
     * @param mixed $healplan
     */
    public function setHealplan($healplan)
    {
        $this->healplan = $healplan;
        $this->checkIntegrity("healplan");
    }

        /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $healplan
     */
    public function setPicture($healplan)
    {
        $this->picture = $healplan;
        $this->checkIntegrity("picture");
    }



}