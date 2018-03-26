<?php

namespace Keet\Form\Examples\Factory\Form;

use Keet\Form\Examples\Form\CityForm;
use Keet\Form\Examples\InputFilter\Form\CityFormInputFilter;
use Keet\Form\Factory\AbstractDoctrineFormFactory;

class CityFormFactory extends AbstractDoctrineFormFactory
{
    public function __construct()
    {
        parent::__construct(CityForm::class, CityFormInputFilter::class);
    }
}