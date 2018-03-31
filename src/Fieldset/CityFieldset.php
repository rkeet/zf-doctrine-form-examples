<?php

namespace Keet\Form\Examples\Fieldset;

use Doctrine\Common\Persistence\ObjectManager;
use Keet\Form\Fieldset\AbstractDoctrineFieldset;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Text;

class CityFieldset extends AbstractDoctrineFieldset
{
    /**
     * @var AddressFieldset
     */
    protected $addressFieldset;

    public function __construct(
        ObjectManager $objectManager,
        string $name,
        array $options = [],
        AddressFieldset $addressFieldset
    ) {
        $this->setAddressFieldset($addressFieldset);

        parent::__construct($objectManager, $name, $options);
    }

    public function init()
    {
        parent::init();

        $this->add([
            'name' => 'name',
            'required' => true,
            'type' => Text::class,
            'options' => [
                'label' => _('Name'),
            ],
        ]);

        $this->add([
            'type' => Collection::class,
            'required' => false,
            'name' => 'addresses',
            'options' => [
                'label' => _('Addresses'),
                'count' => 1,
                'allow_add' => true,
                'allow_remove' => true,
                'should_create_template' => true,
                'target_element' => $this->getAddressFieldset(),
            ],
        ]);

        $this->add([
            'type' => CoordinatesFieldset::class,
            'required' => false,
            'name' => 'coordinates',
            'options' => [
                'label' => _('Coordinates'),
                'use_as_base_fieldset' => false,
            ],
        ]);
    }

    /**
     * @return AddressFieldset
     */
    public function getAddressFieldset(): AddressFieldset
    {
        return $this->addressFieldset;
    }

    /**
     * @param AddressFieldset $addressFieldset
     * @return CityFieldset
     */
    public function setAddressFieldset(AddressFieldset $addressFieldset): CityFieldset
    {
        $this->addressFieldset = $addressFieldset;
        return $this;
    }

}