<?php

namespace Keet\Form\Examples\Factory\Form;

use Keet\Form\Examples\Form\AddressForm;
use Keet\Form\Examples\InputFilter\Form\AddressFormInputFilter;
use Keet\Form\Factory\AbstractDoctrineFormFactory;

class AddressFormFactory extends AbstractDoctrineFormFactory
{
    public function __construct()
    {
        parent::__construct(AddressForm::class, AddressFormInputFilter::class);
    }
}