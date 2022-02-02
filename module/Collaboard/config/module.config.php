<?php

declare(strict_types=1);

namespace Collaboard;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\ServiceManager\ServiceManager;
use Laminas\View\Helper;

return [
    'site' => [
        'title' => 'Collaboard'
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
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
            'inscription' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/inscription',
                    'defaults' => [
                        'controller' => Controller\InscriptionController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\InscriptionController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => \Laminas\View\Helper\Doctype::HTML5,
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
    ],
    'view_helpers' => [
        'aliases' => [
            // 'siteTitle' => Helper\HeadTitle::class
        ],
        'factories' => [
            'siteTitle' => function(ServiceManager $sm) {
                $siteTitle = new Helper\HeadTitle();
                $siteTitle($sm->get('Config')['site']['title']);
                return $siteTitle;
            },
        ],
    ],
    'translator' => [
        'locale' => 'fr_FR',
        'event_manager_enabled' => true,
        'translation_files' => [
            [
                'type'     => \Laminas\I18n\Translator\Loader\PhpArray::class,
                'filename' => __DIR__ . '/../lang/fr_FR.php',
                'locale' => 'fr_FR',
            ],
        ],
    ],
];
