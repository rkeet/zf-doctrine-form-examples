<?php

namespace Keet\Form\Examples\InputFilter\Fieldset;

use Doctrine\Common\Persistence\ObjectManager;
use Keet\Form\Examples\Entity\City;
use Keet\Form\InputFilter\AbstractDoctrineFieldsetInputFilter;
use Keet\Form\InputFilter\CollectionInputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToNull;
use Zend\I18n\Translator\Translator;
use Zend\Validator\StringLength;

class CityFieldsetInputFilter extends AbstractDoctrineFieldsetInputFilter
{
    /** @var CollectionInputFilter $addressFieldsetCollectionInputFilter */
    protected $addressFieldsetCollectionInputFilter;

    /** @var CoordinatesFieldsetInputFilter $coordinatesFieldsetInputFilter */
    protected $coordinatesFieldsetInputFilter;

    public function __construct(
        ObjectManager $objectManager,
        Translator $translator,
        CollectionInputFilter $addressFieldsetCollectionInputFilter,
        CoordinatesFieldsetInputFilter $coordinatesFieldsetInputFilter
    ) {
        $this->addressFieldsetCollectionInputFilter = $addressFieldsetCollectionInputFilter;
        $this->coordinatesFieldsetInputFilter = $coordinatesFieldsetInputFilter;

        parent::__construct([
            'object_manager' => $objectManager,
            'object_repository' => $objectManager->getRepository(City::class),
            'translator' => $translator,
        ]);
    }

    public function init()
    {
        parent::init();

        $this->add($this->addressFieldsetCollectionInputFilter, 'addresses');
        $this->add($this->coordinatesFieldsetInputFilter, 'coordinates');

        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => StringTrim::class],
                ['name' => StripTags::class],
                [
                    'name' => ToNull::class,
                    'options' => [
                        'type' => ToNull::TYPE_STRING,
                    ],
                ],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 255,
                    ],
                ],
            ],
        ]);
    }
}