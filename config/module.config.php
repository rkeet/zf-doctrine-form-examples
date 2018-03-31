<?php

namespace Keet\Form\Examples;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Keet\Form\Examples\Controller\AddressController;
use Keet\Form\Examples\Controller\CityController;
use Keet\Form\Examples\Controller\CoordinatesController;
use Keet\Form\Examples\Factory\Controller\AddressControllerFactory;
use Keet\Form\Examples\Factory\Controller\CityControllerFactory;
use Keet\Form\Examples\Factory\Controller\CoordinatesControllerFactory;

return [
    'controllers' => [
        'factories' => [
            AddressController::class => AddressControllerFactory::class,
            CityController::class => CityControllerFactory::class,
            CoordinatesController::class => CoordinatesControllerFactory::class,
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Entity',
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ],
            ],
        ],
    ],
    'view_manager' => [
        'controller_map' => [
            'Keet\Form\Examples' => 'keet',
        ],
        'template_map' => [
            'keet/partials/address/addressForm' => __DIR__ . '/../view/partials/address/address-form.phtml',
            'keet/partials/city/cityForm' => __DIR__ . '/../view/partials/city/city-form.phtml',
            'keet/partials/coordinates/coordinatesForm' => __DIR__ . '/../view/partials/coordinates/coordinates-form.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . DIRECTORY_SEPARATOR .'..' . DIRECTORY_SEPARATOR . 'view',
        ],
    ],
];