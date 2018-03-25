<?php

namespace Keet\Form\Examples\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class City
 * @package Keet\Form\Examples\Entity
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity
 */
class City extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var Collection|ArrayCollection|Address[]
     * @ORM\OneToMany(targetEntity="Keet\Form\Examples\Entity\Address", mappedBy="city", fetch="EAGER", orphanRemoval=true, cascade={"persist", "remove"})
     */
    protected $addresses;

    /**
     * @var Coordinates
     * @ORM\OneToOne(targetEntity="Keet\Form\Examples\Entity\Coordinates", cascade={"persist", "remove"}, fetch="EAGER", orphanRemoval=true)
     * @ORM\JoinColumn(name="coordinates_id", referencedColumnName="id", nullable=true)
     */
    protected $coordinates;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return City
     */
    public function setName(string $name): City
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return Collection|ArrayCollection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    /**
     * @param Collection|ArrayCollection|Address[] $addresses
     * @return $this
     */
    public function addAddresses(Collection $addresses): City
    {
        foreach ($addresses as $address) {
            if (!$this->addresses->contains($address)) {
                $this->addresses->add($address);
            }

            $address->setCity($this);
        }

        return $this;
    }

    /**
     * @param Collection|ArrayCollection|Address[] $addresses
     * @return $this
     */
    public function removeAddresses(Collection $addresses): City
    {
        foreach ($addresses as $address) {
            if ($this->addresses->contains($address)) {
                $this->addresses->removeElement($address);
            }
        }

        return $this;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     * @return City
     */
    public function setCoordinates(Coordinates $coordinates): City
    {
        $this->coordinates = $coordinates;
        return $this;
    }

}