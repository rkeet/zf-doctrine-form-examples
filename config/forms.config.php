<?php

namespace Keet\Form\Examples;

use Keet\Form\Examples\Factory\Fieldset\AddressFieldsetFactory;
use Keet\Form\Examples\Factory\Fieldset\CityFieldsetFactory;
use Keet\Form\Examples\Factory\Fieldset\CoordinatesFieldsetFactory;
use Keet\Form\Examples\Factory\Form\AddressFormFactory;
use Keet\Form\Examples\Factory\Form\CityFormFactory;
use Keet\Form\Examples\Factory\Form\CoordinatesFormFactory;
use Keet\Form\Examples\Factory\InputFilter\Fieldset\AddressFieldsetInputFilterFactory;
use Keet\Form\Examples\Factory\InputFilter\Fieldset\CityFieldsetInputFilterFactory;
use Keet\Form\Examples\Factory\InputFilter\Fieldset\CoordinatesFieldsetInputFilterFactory;
use Keet\Form\Examples\Factory\InputFilter\Form\AddressFormInputFilterFactory;
use Keet\Form\Examples\Factory\InputFilter\Form\CityFormInputFilterFactory;
use Keet\Form\Examples\Factory\InputFilter\Form\CoordinatesFormInputFilterFactory;
use Keet\Form\Examples\Fieldset\AddressFieldset;
use Keet\Form\Examples\Fieldset\CityFieldset;
use Keet\Form\Examples\Fieldset\CoordinatesFieldset;
use Keet\Form\Examples\Form\AddressForm;
use Keet\Form\Examples\Form\CityForm;
use Keet\Form\Examples\Form\CoordinatesForm;
use Keet\Form\Examples\InputFilter\Fieldset\AddressFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Fieldset\CityFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Fieldset\CoordinatesFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Form\AddressFormInputFilter;
use Keet\Form\Examples\InputFilter\Form\CityFormInputFilter;
use Keet\Form\Examples\InputFilter\Form\CoordinatesFormInputFilter;

return [
    'form_elements' => [
        'factories' => [
            AddressForm::class => AddressFormFactory::class,
            AddressFieldset::class => AddressFieldsetFactory::class,

            CityForm::class => CityFormFactory::class,
            CityFieldset::class => CityFieldsetFactory::class,

            CoordinatesForm::class => CoordinatesFormFactory::class,
            CoordinatesFieldset::class => CoordinatesFieldsetFactory::class,
        ],
    ],
    'input_filters' => [
        'factories' => [
            AddressFormInputFilter::class => AddressFormInputFilterFactory::class,
            AddressFieldsetInputFilter::class => AddressFieldsetInputFilterFactory::class,

            CityFormInputFilter::class => CityFormInputFilterFactory::class,
            CityFieldsetInputFilter::class => CityFieldsetInputFilterFactory::class,

            CoordinatesFormInputFilter::class => CoordinatesFormInputFilterFactory::class,
            CoordinatesFieldsetInputFilter::class => CoordinatesFieldsetInputFilterFactory::class,
        ],
    ],
];