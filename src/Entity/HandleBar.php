<?php
namespace App\Entity;

use App\Entity\BicyclePart;
use App\Entity\Material;

class HandleBar extends BicyclePart implements Material {
    private String $handleBarMaterial;

    public function __construct(String $handleBarMaterial, String $color, float $weight)
    {
        $this->setMaterial($handleBarMaterial);
        parent::__construct($color, $weight);
    }

    /**
     * gets value of handleBarMaterial
     *
     * @return string
     */
    public function getMaterial(): string
    {
        return $this->handleBarMaterial;
    }

    /**
     * Set the value of handleBarMaterial
     * 
     * @param String $handleBarMaterial
     * @throws \InvalidArgumentException
     * @return  self
     */ 
    public function setMaterial(String $handleBarMaterial): self
    {
        if( in_array($handleBarMaterial, Material::ALLOWED_MATERIALS, true) ) {
            $this->handleBarMaterial = $handleBarMaterial;
            return $this;
            
        } else {
            throw new \InvalidArgumentException(
                'Value must be one of the following: ' . 
                implode(', ', Material::ALLOWED_MATERIALS)
            );
        }
        
    }
}