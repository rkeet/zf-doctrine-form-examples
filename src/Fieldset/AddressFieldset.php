<?php

namespace Keet\Form\Examples\Fieldset;

use DoctrineModule\Form\Element\ObjectSelect;
use Keet\Form\Examples\Entity\City;
use Keet\Form\Fieldset\AbstractDoctrineFieldset;
use Zend\Form\Element\Text;

class AddressFieldset extends AbstractDoctrineFieldset
{

    public function init()
    {
        parent::init();

        $this->add([
            'name' => 'street',
            'required' => true,
            'type' => Text::class,
            'options' => [
                'label' => _('Street'),
            ],
        ]);

        $this->add([
            'name' => 'city',
            'required' => true,
            'type' => ObjectSelect::class,
            'options' => [
                'object_manager' => $this->getObjectManager(),
                'target_class'   => City::class,
                'property'       => 'id',
                'display_empty_item' => true,
                'empty_item_label'   => '---',
                'label' => _('City'),
                'label_generator' => function ($targetEntity) {
                    /** @var City $targetEntity */
                    return $targetEntity->getName();
                },
            ],
        ]);

        $this->add([
            'type' => CoordinatesFieldset::class,
            'required' => false,
            'name' => 'coordinates',
            'options' => [
                'use_as_base_fieldset' => false,
            ],
        ]);
    }
}