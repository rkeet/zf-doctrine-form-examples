<?php

namespace Keet\Form\Examples\Factory\Fieldset;

use Keet\Form\Examples\Entity\Coordinates;
use Keet\Form\Examples\Fieldset\CoordinatesFieldset;
use Keet\Form\Factory\AbstractDoctrineFieldsetFactory;

class CoordinatesFieldsetFactory extends AbstractDoctrineFieldsetFactory
{
    public function __construct()
    {
        parent::__construct(CoordinatesFieldset::class, 'coordinates', Coordinates::class);
    }
}