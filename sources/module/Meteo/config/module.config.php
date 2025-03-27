<?php

namespace Meteo;

use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\MeteoController::class => ReflectionBasedAbstractFactory::class
        ],
    ],
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'meteo' => [
                'type' => Segment::class,
                'options' => [
                    // Listen to "/meteo" as uri:
                    'route' => '/meteo',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    // this route is matched
                    'defaults' => [
                        'controller' => Controller\MeteoController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:city',
                            'defaults' => [
                                'action' => 'city',
                            ],
                        ],
                        'constraints' => [
                            'city' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'meteo' => __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'aliases' => [
            Model\MeteoRepositoryInterface::class => Model\MeteoRepository::class,
        ],
        'factories' => [
            Model\MeteoRepository::class => InvokableFactory::class,
      
        ],
    ],
];
