<?php

namespace Keet\Form\Examples\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 * @package Keet\Form\Examples\Entity
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractEntity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AbstractEntity
     */
    public function setId(int $id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }

}