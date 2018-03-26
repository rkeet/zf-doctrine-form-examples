<?php

namespace Keet\Form\Examples\InputFilter\Form;

use Doctrine\Common\Persistence\ObjectManager;
use Keet\Form\Examples\InputFilter\Fieldset\CityFieldsetInputFilter;
use Keet\Form\InputFilter\AbstractDoctrineFormInputFilter;
use Zend\I18n\Translator\Translator;

class CityFormInputFilter extends AbstractDoctrineFormInputFilter
{
    /** @var CityFieldsetInputFilter  */
    protected $cityFieldsetInputFilter;

    public function __construct(
        ObjectManager $objectManager,
        Translator $translator,
        CityFieldsetInputFilter $filter
    ) {
        $this->cityFieldsetInputFilter = $filter;

        parent::__construct([
            'object_manager' => $objectManager,
            'translator' => $translator,
        ]);
    }

    public function init()
    {
        $this->add($this->cityFieldsetInputFilter, 'city');

        parent::init();
    }
}