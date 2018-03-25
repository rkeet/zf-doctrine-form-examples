<?php

namespace Keet\Form\Examples\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Coordinates
 * @package Keet\Form\Examples\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="coordinates")
 */
class Coordinates extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name="latitude", type="string", nullable=false)
     */
    protected $latitude;

    /**
     * @var string
     * @ORM\Column(name="longitude", type="string", nullable=false)
     */
    protected $longitude;

    /**
     * @return string
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return Coordinates
     */
    public function setLatitude(string $latitude): Coordinates
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return Coordinates
     */
    public function setLongitude(string $longitude): Coordinates
    {
        $this->longitude = $longitude;
        return $this;
    }

}