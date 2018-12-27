<?php

namespace Learn;


use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;
use Learn\Controller\LearnController;


return [

    'router' => [
        'routes' => [
            'Learn' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/learn[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\LearnController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\LearnController::class => InvokableFactory::class,
        ],
    ],    
    
    'view_manager' => [
        'template_path_stack' => [
            'learn' => __DIR__ . '/../view',
        ],
    ],
];