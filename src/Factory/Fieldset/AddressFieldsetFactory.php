<?php

namespace Keet\Form\Examples\Factory\Fieldset;

use Keet\Form\Examples\Entity\Address;
use Keet\Form\Examples\Fieldset\AddressFieldset;
use Keet\Form\Factory\AbstractDoctrineFieldsetFactory;

class AddressFieldsetFactory extends AbstractDoctrineFieldsetFactory
{
    public function __construct()
    {
        parent::__construct(AddressFieldset::class, 'address', Address::class);
    }
}