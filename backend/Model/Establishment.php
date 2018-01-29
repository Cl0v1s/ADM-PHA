<?php
/**
 * Created by PhpStorm.
 * User: Clovis
 * Date: 30/10/2017
 * Time: 19:53
 */

  /**
  * Classe du modèle correspondant aux établissements
  **/
class Establishment extends StorageItem
{
    /**
     * @Required
     * @Word
     * @Size(min=1, max=400)
     */
    public $name;

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
}