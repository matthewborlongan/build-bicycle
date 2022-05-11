<?php
namespace App\Entity;

use App\Entity\BicyclePart;

class Seat extends BicyclePart {
    private int $seatGender; 

    /**
     *
     * @param int $seatGender
     * @param String $color
     * @param float $weight
     */
    public function __construct(int $seatGender, String $color, float $weight)
    {
        $this->setSeatGender($seatGender);
        parent::__construct($color, $weight);
    }

    /**
     * Get the value of seatGender
     * 
     * @return int
     */ 
    public function getSeatGender(): int
    {
        return $this->seatGender;
    }

    /**
     * Set the value of seatGender
     *
     * @param int $seatGender
     * @throws InvalidArgumentException
     * @return  self
     */ 
    public function setSeatGender(int $seatGender): self
    {
        if($seatGender === 1 or $seatGender === 0) {
            $this->seatGender = $seatGender;
            return $this;
            
        } else {
            throw new \InvalidArgumentException('Value of seat gender must be 1 or 0');
        }
    }
}