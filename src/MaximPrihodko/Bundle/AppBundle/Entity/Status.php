<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 09.10.17
 * Time: 16:10
 */

namespace MaximPrihodko\Bundle\AppBundle\Entity;


interface Status
{
    public function getId();

    public function setName($name);
    public function getName();

    public function setTranslation($translation);
    public function getTranslation();
}