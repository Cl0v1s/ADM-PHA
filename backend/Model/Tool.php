<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 30/10/2017
 * Time: 19:56
 */

  /**
  * Classe du modèle correspondant aux DM et AT 
  **/
class Tool extends StorageItem
{
    /**
     * @Required
     * @Word
     * @Size(min=1,max=400)
     */
    public $name;

    /**
     * @Word
     * @Size(min=1,max=400)
     */
    public $picture;

    /**
     * @Required
     * @Word
     * @Size(min=1,max=1000)
     */
    public $description;

    /**
     * @Word
     * @Size(min=1,max=1000)
     */
    public $autonomy;

    /**
     * @Word
     * @Size(min=1,max=1000)
     */
    public $guide;

    /**
     * @Word
     * @Size(min=1,max=1000)
     */
    public $invasive;

    /**
     * @Word
     * @Size(min=1,max=1000)
     */
    public $constructor;

    /**
     * @Word
     * @Size(min=1,max=1000)
     */
    public $advantages;

    /**
     * @Numeric
     */
    public $price;

    /**
     * @Numeric
     */
    public $refund;

    /**
     * @Numeric
     */
    public $humans;

    /**
     * @Required
     * @Word
     * @Size(min=1, max=400)
     */
    public $type;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }




    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        $this->checkIntegrity("name");
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        $this->checkIntegrity("description");
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
    public function getGuide()
    {
        return $this->guide;
    }

    /**
     * @param mixed $guide
     */
    public function setGuide($guide)
    {
        $this->guide = $guide;
        $this->checkIntegrity("guide");

    }

    /**
     * @return mixed
     */
    public function getInvasive()
    {
        return $this->invasive;
    }

    /**
     * @param mixed $invasive
     */
    public function setInvasive($invasive)
    {
        $this->invasive = $invasive;
        $this->checkIntegrity("invasive");

    }

    /**
     * @return mixed
     */
    public function getConstructor()
    {
        return $this->constructor;
    }

    /**
     * @param mixed $constructor
     */
    public function setConstructor($constructor)
    {
        $this->constructor = $constructor;
        $this->checkIntegrity("constructor");

    }

    /**
     * @return mixed
     */
    public function getAdvantages()
    {
        return $this->advantages;
    }

    /**
     * @param mixed $advantages
     */
    public function setAdvantages($advantages)
    {
        $this->advantages = $advantages;
        $this->checkIntegrity("advantages");

    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        $this->checkIntegrity("price");
    }

    /**
     * @return mixed
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param mixed $refund
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;
        $this->checkIntegrity("refund");
    }

    /**
     * @return mixed
     */
    public function getHumans()
    {
        return $this->humans;
    }

    /**
     * @param mixed $humans
     */
    public function setHumans($humans)
    {
        $this->humans = $humans;
        $this->checkIntegrity("humans");
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
        $this->checkIntegrity("type");
    }

        /**
     * @return mixed
     */
    public function getPciture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $type
     */
    public function setPicture($type)
    {
        $this->picture = $type;
        $this->checkIntegrity("picture");
    }



}