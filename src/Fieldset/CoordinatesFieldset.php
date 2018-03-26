<?php

namespace Keet\Form\Examples\Fieldset;

use Keet\Form\Fieldset\AbstractFieldset;
use Zend\Form\Element\Text;

class CoordinatesFieldset extends AbstractFieldset
{
    public function init()
    {
        parent::init();

        $this->add([
            'name' => 'latitude',
            'required' => true,
            'type' => Text::class,
            'options' => [
                'label' => _('Latitude'),
            ],
        ]);

        $this->add([
            'name' => 'longitude',
            'required' => true,
            'type' => Text::class,
            'options' => [
                'label' => _('Longitude'),
            ],
        ]);
    }
}