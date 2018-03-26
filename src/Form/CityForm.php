<?php

namespace Keet\Form\Examples\Form;

use Keet\Form\Examples\Fieldset\CityFieldset;
use Keet\Form\Form\AbstractDoctrineForm;

class CityForm extends AbstractDoctrineForm
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'city',
            'type' => CityFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        //Call parent initializer. Check in parent what it does.
        parent::init();
    }
}