<?php

namespace Keet\Form\Examples\Form;

use Keet\Form\Examples\Fieldset\AddressFieldset;
use Keet\Form\Form\AbstractDoctrineForm;

class AddressForm extends AbstractDoctrineForm
{
    public function init()
    {
        $this->add([
            'name' => 'address',
            'type' => AddressFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        //Call parent initializer. Check in parent what it does.
        parent::init();
    }
}