<?php

declare(strict_types=1);

namespace Collaboard;

use Laminas\EventManager\EventManager;
use Laminas\Mvc\Application;
use Laminas\Mvc\MvcEvent;
use Laminas\ServiceManager\ServiceManager;
use Laminas\View\Helper;
use Laminas\View\HelperPluginManager;
use Laminas\View\Model\ViewModel;

class Module
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }
}
