<?php
namespace App\Entity;

use App\Entity\BicyclePart;

class Pedal extends BicyclePart {
    private float $length;
    private float $width;
    
    public function __construct(float $length, float $width, String $color, float $weight)
    {
        $this->length = $length;
        $this->width = $width;
        parent::__construct($color, $weight);
    }

    /**
     * Get the value of length
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     * @param float $length
     * @return  self
     */ 
    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of width
     * 
     * @return float
     */ 
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @param float $width
     * @return  self
     */ 
    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }
}