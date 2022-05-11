<?php
namespace App\Entity;
use App\Entity\BicyclePart;

class Wheel extends BicyclePart {
    private float $diameter;

    /**
     *
     * @param float $diameter
     * @param String $color
     * @param String $weight
     */
    public function __construct(float $diameter, String $color, String $weight)
    {
        $this->diameter = $diameter;
        parent::__construct($color, $weight);
    }

    /**
     * Get the value of diameter
     * @return float
     */ 
    public function getDiameter(): float
    {
        return $this->diameter;
    }

    /**
     * Set the value of diameter
     * @param float $diameter
     * @return  self
     */ 
    public function setDiameter(float $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }
}