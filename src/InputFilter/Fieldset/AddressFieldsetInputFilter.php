<?php

namespace Keet\Form\Examples\InputFilter\Fieldset;

use Doctrine\ORM\EntityManager;
use Keet\Form\InputFilter\AbstractDoctrineFieldsetInputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToNull;
use Zend\I18n\Translator\Translator;
use Zend\Validator\StringLength;

class AddressFieldsetInputFilter extends AbstractDoctrineFieldsetInputFilter
{
    /** @var CoordinatesFieldsetInputFilter $coordinatesFieldsetInputFilter */
    protected $coordinatesFieldsetInputFilter;

    public function __construct(
        EntityManager $objectManager,
        Translator $translator,
        string $entityFQCN = null,
        CoordinatesFieldsetInputFilter $filter
    ) {
        $this->coordinatesFieldsetInputFilter = $filter;

        parent::__construct([
            'object_manager' => $objectManager,
            'object_repository' => $objectManager->getRepository(is_null($entityFQCN) ? Address::class : $entityFQCN),
            'translator' => $translator,
        ]);
    }

    /**
     * Sets AddressFieldset Element validation
     */
    public function init()
    {
        parent::init();

        $this->add($this->coordinatesFieldsetInputFilter, 'coordinates');

        $this->add([
            'name' => 'street',
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

        $this->add([
            'name' => 'city',
            'required' => true,
        ]);
    }
}