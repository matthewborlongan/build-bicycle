<?php
namespace App\Entity;

use App\Entity\BicyclePart;

class Seat extends BicyclePart {
    private string $seatGender; 

    /**
     *
     * @param string $seatGender
     * @param String $color
     * @param float $weight
     */
    public function __construct(string $seatGender, String $color, float $weight)
    {
        $this->setSeatGender($seatGender);
        parent::__construct($color, $weight);
    }

    /**
     * Get the value of seatGender
     * 
     * @return string
     */ 
    public function getSeatGender(): string
    {
        return $this->seatGender;
    }

    /**
     * Set the value of seatGender
     *
     * @param string $seatGender
     * @throws InvalidArgumentException
     * @return  self
     */ 
    public function setSeatGender(string $seatGender): self
    {
        if($seatGender === 'female' or $seatGender === 'male') {
            $this->seatGender = $seatGender;
            return $this;
            
        } else {
            throw new \InvalidArgumentException('Value of seat gender must be 1 or 0');
        }
    }
}