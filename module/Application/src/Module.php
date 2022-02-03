<?php

declare(strict_types=1);

namespace Application;

use Application\Services\Covid19Service;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

use Application\Interfaces\Covid19Api;

class Module implements ConfigProviderInterface
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function getControllerConfig(): array {
        return [
            'factories' => [
                Controller\IndexController::class => function($container) {
                    return new Controller\IndexController(
                        $container->get(Covid19Api::class),
                        $container->get(Covid19Service::class),
                    );
                },
            ],
        ];
    }
}
