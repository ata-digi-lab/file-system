<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem;

use XimplyCMS\Contracts\Extension\ComponentInterface;
use XimplyCMS\DependencyInjection\Adapter\Container;

final class Component implements ComponentInterface
{
    public function init(Container $container): void
    {
        $container->loadFile(__DIR__ . '/Resources/config/', 'services.yml');
    }
}
