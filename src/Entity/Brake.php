<?php
namespace App\Entity;

use App\Entity\BicyclePart;

class Brake extends BicyclePart {
    public const BRAKE_TYPES = array('disk', 'rim', 'coaster', 'drum');
    private String $type;

    public function __construct($type, $color, $weight) 
    {
        $this->setType($type);
        parent::__construct($color, $weight);    
    }

    /**
     * sets brake type
     *
     * @param string $type
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setType(string $type): self 
    {
        if( in_array($type, Brake::BRAKE_TYPES, true) ) {
            $this->type = $type;
            return $this;

        } else {
            throw new \InvalidArgumentException('The brake type must be one of the following ' . Brake::BRAKE_TYPES);
        }
    }


}