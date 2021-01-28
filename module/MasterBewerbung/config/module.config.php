<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MasterBewerbung;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;


return [

    'controllers' => [
        'factories' => [
            Controller\TutorialController::class => InvokableFactory::class,
            Controller\BewerbenController::class => Factory\BewerbenControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'masterbewerbung' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/master-bewerbung[/:action[?idBewerbungscode=:idBewerbungscode]]',
                     'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'idBewerbungscode'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\BewerbenController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            'tutorial' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/master-bewerbung/tutorial',
                    'defaults' => [
                        'controller' => Controller\TutorialController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
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
            'masterbewerbung/index/index' => __DIR__ . '/../view/masterbewerbung/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
