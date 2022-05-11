<?php
namespace App\Entity;

class BicyclePart {
    protected String $color;
    protected float $weight;

    /**
     *
     * @param String $color
     * @param float $weight
     */
    protected function __construct(String $color, float $weight)
    {
        $this->color = $color;
        $this->weight = $weight;
    }

    /**
     * Get the value of color
     * 
     * @return String
     */ 
    protected function getColor(): String
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    protected function setColor($color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of weight
     * @return float
     */ 
    protected function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    protected function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}