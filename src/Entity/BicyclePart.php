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
    public function __construct(String $color, float $weight)
    {
        $this->color = $color;
        $this->weight = $weight;
    }

    /**
     * Get the value of color
     * 
     * @return String
     */ 
    public function getColor(): String
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of weight
     * @return float
     */ 
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}