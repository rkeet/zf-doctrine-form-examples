<?php

namespace Keet\Form\Examples;

use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'cities' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/cities',
                    'defaults' => [
                        'controller' => CityController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
];