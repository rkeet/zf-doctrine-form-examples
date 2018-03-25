<?php

namespace Keet\Form\Examples;

use Keet\Form\Examples\Controller\CoordinatesController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'coordinates' => [
                'type' => Literal::class,
                'may_terminate' => true,
                'options' => [
                    'route' => '/coordinates',
                    'defaults' => [
                        'controller' => CoordinatesController::class,
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
                                'controller'    => CoordinatesController::class,
                                'action'        => 'view',
                            ],
                        ],
                        'child_routes' => [
                            'edit' => [
                                'type'    => Literal::class,
                                'options' => [
                                    'route'    => '/edit',
                                    'defaults' => [
                                        'controller'    => CoordinatesController::class,
                                        'action'        => 'edit',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type'    => Literal::class,
                                'options' => [
                                    'route'    => '/delete',
                                    'defaults' => [
                                        'controller'    => CoordinatesController::class,
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
                                'controller' => CoordinatesController::class,
                                'action' => 'add',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];