<?php

namespace Keet\Form\Examples\Factory\Form;

use Keet\Form\Examples\Form\CoordinatesForm;
use Keet\Form\Examples\InputFilter\Form\CoordinatesFormInputFilter;
use Keet\Form\Factory\AbstractDoctrineFormFactory;

class CoordinatesFormFactory extends AbstractDoctrineFormFactory
{
    public function __construct()
    {
        parent::__construct(CoordinatesForm::class, CoordinatesFormInputFilter::class);
    }
}