<?php
namespace App\Entity;

interface Material {
    public const ALLOWED_MATERIALS = array('aluminum', 'carbon fiber');

    /**
     * function to set the material for some part of a vehicle
     *
     * @param String $material
     * @return self
     */
    public function setMaterial(String $material);


    /**
     * gets the material of the vehicle part
     * 
     * @throws \IllegalArgumentException
     * @return String
     */
    public function getMaterial(): String;
}