<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'load' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/load',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'load',
                    ],
                ],
            ],
            'localidad' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/localidad',
                    'defaults' => [
                        'controller' => \Localidad\Controller\LocalidadController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'proyecto' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/proyecto',
                    'defaults' => [
                        'controller' => \Proyecto\Controller\ProyectoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'persona' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/persona',
                    'defaults' => [
                        'controller' => \Persona\Controller\PersonaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'persona_proyecto' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/persona_proyecto',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'vincular',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ]
];
