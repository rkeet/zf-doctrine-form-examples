<?php

namespace Keet\Form\Examples\InputFilter\Form;

use Doctrine\Common\Persistence\ObjectManager;
use Keet\Form\Examples\InputFilter\Fieldset\AddressFieldsetInputFilter;
use Keet\Form\InputFilter\AbstractDoctrineFormInputFilter;
use Zend\I18n\Translator\Translator;

class AddressFormInputFilter extends AbstractDoctrineFormInputFilter
{
    /** @var AddressFieldsetInputFilter $addressFieldsetInputFilter */
    protected $addressFieldsetInputFilter;

    public function __construct(
        ObjectManager $objectManager,
        Translator $translator,
        AddressFieldsetInputFilter $filter
    ) {
        $this->addressFieldsetInputFilter = $filter;

        parent::__construct([
            'object_manager' => $objectManager,
            'translator' => $translator,
        ]);
    }

    public function init()
    {
        $this->add($this->addressFieldsetInputFilter, 'address');

        parent::init();
    }
}