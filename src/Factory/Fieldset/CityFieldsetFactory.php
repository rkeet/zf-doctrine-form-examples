<?php

namespace Keet\Form\Examples\Factory\Fieldset;

use Keet\Form\Examples\Entity\City;
use Keet\Form\Examples\Fieldset\CityFieldset;
use Keet\Form\Factory\AbstractDoctrineFieldsetFactory;

class CityFieldsetFactory extends AbstractDoctrineFieldsetFactory
{
    public function __construct()
    {
        parent::__construct(CityFieldset::class, 'city', City::class);
    }
}