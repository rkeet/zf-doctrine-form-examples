<?php

namespace Keet\Form\Examples\InputFilter\Fieldset;

use Keet\Form\InputFilter\AbstractDoctrineFieldsetInputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToNull;
use Zend\Filter\Callback as CallbackFilter;
use Zend\Validator\Callback as CallbackValidator;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

class CoordinatesFieldsetInputFilter extends AbstractDoctrineFieldsetInputFilter
{
    public function init()
    {
        parent::init();

        $this->add([
            'name' => 'latitude',
            'required' => true,
            'allow_empty' => true,
            'filters' => [
                ['name' => StringTrim::class],
                ['name' => StripTags::class],
                [
                    'name' => ToNull::class,
                    'options' => [
                        'type' => ToNull::TYPE_STRING,
                    ],
                ],
                [
                    'name' => CallbackFilter::class,
                    'options' => [
                        'callback' => function ($value) {
                            $float = $value;

                            if ($value) {
                                $float = str_replace(',', '.', $value);
                            }

                            return $float;
                        },
                    ],
                ],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 2,
                        'max' => 255,
                    ],
                ],
                [
                    'name' => CallbackValidator::class,
                    'options' => [
                        'callback' => function($value, $context) {
                            //If longitude has a value, mark required
                            if(empty($context['longitude']) && strlen($value) > 0) {
                                $validatorChain = $this->getInputs()['longitude']->getValidatorChain();

                                $validatorChain->attach(new NotEmpty(['type' => NotEmpty::NULL]));
                                $this->getInputs()['longitude']->setValidatorChain($validatorChain);

                                return false;
                            }

                            return true;
                        },
                        'messages' => [
                            'callbackValue' => _('Longitude is required when setting Latitude. Give both or neither.'),
                        ],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'longitude',
            'required' => true,
            'allow_empty' => true,
            'filters' => [
                ['name' => StringTrim::class],
                ['name' => StripTags::class],
                [
                    'name' => ToNull::class,
                    'options' => [
                        'type' => ToNull::TYPE_STRING,
                    ],
                ],
                [
                    'name' => CallbackFilter::class,
                    'options' => [
                        'callback' => function ($value) {
                            $float = $value;

                            if ($value) {
                                $float = str_replace(',', '.', $value);
                            }

                            return $float;
                        },
                    ],
                ],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 2,
                        'max' => 255,
                    ],
                ],
                [
                    'name' => CallbackValidator::class,
                    'options' => [
                        'callback' => function($value, $context) {
                            //If longitude has a value, mark required
                            if(empty($context['latitude']) && strlen($value) > 0) {
                                $validatorChain = $this->getInputs()['latitude']->getValidatorChain();
                                $validatorChain->attach(new NotEmpty(true));
                                $this->getInputs()['latitude']->setValidatorChain($validatorChain);

                                return false;
                            }

                            return true;
                        },
                        'messages' => [
                            'callbackValue' => _('Latitude is required when setting Longitude. Give both or neither.'),
                        ],
                    ],
                ],
            ],
        ]);
    }
}