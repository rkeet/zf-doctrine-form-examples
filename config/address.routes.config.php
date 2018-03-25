<?php

namespace Keet\Form\Examples;

use Keet\Form\Examples\Controller\AddressController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'addresses' => [
                'type' => Literal::class,
                'may_terminate' => true,
                'options' => [
                    'route' => '/addresses',
                    'defaults' => [
                        'controller' => AddressController::class,
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
                                'controller'    => AddressController::class,
                                'action'        => 'view',
                            ],
                        ],
                        'child_routes' => [
                            'edit' => [
                                'type'    => Literal::class,
                                'options' => [
                                    'route'    => '/edit',
                                    'defaults' => [
                                        'controller'    => AddressController::class,
                                        'action'        => 'edit',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type'    => Literal::class,
                                'options' => [
                                    'route'    => '/delete',
                                    'defaults' => [
                                        'controller'    => AddressController::class,
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
                                'controller' => AddressController::class,
                                'action' => 'add',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];