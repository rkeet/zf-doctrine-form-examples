<?php

namespace Keet\Form\Examples\Form;

use Keet\Form\Examples\Fieldset\CoordinatesFieldset;
use Keet\Form\Form\AbstractDoctrineForm;

class CoordinatesForm extends AbstractDoctrineForm
{
    public function init()
    {
        $this->add([
            'name' => 'coordinates',
            'type' => CoordinatesFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        //Call parent initializer. Check in parent what it does.
        parent::init();
    }
}