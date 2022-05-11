<?php
namespace App\Entity;

use App\Entity\BicyclePart;
use App\Entity\Material;

class Frame extends BicyclePart implements Material {
    private String $frameMaterial;

    /**
     *
     * @param String $materialConstruction
     * @param String $color
     * @param float $weight
     */
    public function __construct(String $frameMaterial, String $color, float $weight)
    {
        $this->setMaterial($frameMaterial);
        parent::__construct($color, $weight);
    }

    /**
     * sets frame material
     *
     * @param string $material
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setMaterial(string $material): self
    {
        if( in_array($material, Material::ALLOWED_MATERIALS, true) ) {
            $this->frameMaterial = $material;
            return $this;

        } else {
            throw new \InvalidArgumentException('Frame material must be one of the following: ' . implode(', ', Material::ALLOWED_MATERIALS));
        }
    }

    /**
     * Get the value of materialConstruction
     * 
     * @return String
     */ 
    public function getMaterial(): string
    {
        return $this->frameMaterial;
    }
}