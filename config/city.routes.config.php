<?php

namespace Keet\Form\Examples;

use Keet\Form\Examples\Controller\CityController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'cities' => [
                'type' => Literal::class,
                'may_terminate' => true,
                'options' => [
                    'route' => '/cities',
                    'defaults' => [
                        'controller' => CityController::class,
                        'action' => 'index',
                    ],
                ],
                'child_routes' => [
                    'view' => [
                        'type'    => Segment::class,
                        'may_terminate' => true,
                        'options' => [
                            'route'    => '/:id',
                            'constraints' => [
                                'id' => '[0-9]*',
                            ],
                            'defaults' => [
                                'controller'    => CityController::class,
                                'action'        => 'view',
                            ],
                        ],
                        'child_routes' => [
                            'edit' => [
                                'type'    => Literal::class,
                                'options' => [
                                    'route'    => '/edit',
                                    'defaults' => [
                                        'controller'    => CityController::class,
                                        'action'        => 'edit',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type'    => Literal::class,
                                'options' => [
                                    'route'    => '/delete',
                                    'defaults' => [
                                        'controller'    => CityController::class,
                                        'action'        => 'delete',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => CityController::class,
                                'action' => 'add',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];