<?php

namespace Keet\Form\Examples\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Address
 * @package Keet\Form\Examples\Entity
 *
 * @ORM\Table(name="addresses")
 * @ORM\Entity
 */
class Address extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name="street", type="string", length=255, nullable=false)
     */
    protected $street;

    /**
     * @var City
     * @ORM\ManyToOne(targetEntity="Keet\Form\Examples\Entity\City", inversedBy="addresses", fetch="EAGER")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id", nullable=false)
     */
    protected $city;

    /**
     * @var Coordinates
     * @ORM\OneToOne(targetEntity="Keet\Form\Examples\Entity\Coordinates", cascade={"persist", "remove"}, fetch="EAGER", orphanRemoval=true)
     * @ORM\JoinColumn(name="coordinates_id", referencedColumnName="id", nullable=true)
     */
    protected $coordinates;

    /**
     * @return string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): ?City
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return Address
     */
    public function setCity(City $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return Coordinates|null
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     * @return Address
     */
    public function setCoordinates(Coordinates $coordinates): Address
    {
        $this->coordinates = $coordinates;
        return $this;
    }

}