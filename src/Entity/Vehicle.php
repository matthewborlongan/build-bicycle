<?php
namespace App\Entity;

class Vehicle {
    protected float $length;
    protected float $width; 
    protected float $height; 
    protected float $weight;

    /**
     *
     * @param float $length
     * @param float $width
     * @param float $height
     * @param float $weight
     */
    protected function __construct(float $length, float $width, float $height, float $weight) 
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    /**
     * Get the value of length
     * @return float
     */ 
    protected function getLength(): float
    {
        return $this->length;
    }

    /**
     * Set the value of length
     * @param float $length
     * @return  self
     */ 
    protected function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    protected function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Set the value of width
     * @param float $width
     * @return  self
     */ 
    protected function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of height
     * 
     * @return float
     */ 
    protected function getHeight(): float
    {
        return $this->height;
    }

    /**
     * Set the value of height
     * @param float $height
     * @return  self
     */ 
    protected function setHeight(float $height): self
    {
        $this->height = $height;

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
     * @param float $weight
     * @return  self
     */ 
    protected function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}