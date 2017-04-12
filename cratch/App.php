<?php

namespace Cratch;

use Cratch\Config\Config;
use Cratch\Config\MainConfig;
use Cratch\Config\UserConfig;
use Cratch\Container\ServiceContainer;
use Cratch\Contracts\Config\ConfigInterface;

class App
{
    /**
     * @var ServiceContainer
     */
    private $container;

    /**
     * @var Config
     */
    private $config;

    public function __construct()
    {
        $this->container = (new ServiceContainer())->getInstance();

        // init config
        $this->initConfig();

        // Set to container classes from config/app
        $this->setClasses();

        // Init router system...:D
        require __DIR__.'../../app/route.php';
    }


    private function setClasses(): void
    {
        foreach ($this->config->get('app.required') as $k => $v) {
            $this->container->register($k, $v);
        }
    }

    /**
     * We need classes from config/app.php
     */
    private function initConfig(): void
    {
        $this->container->register('mainConfig', Config::class);
        $this->container->setParams(
            'mainConfig', [
            ConfigInterface::class => MainConfig::class,
        ]
        );
        $this->config = $this->container->make('mainConfig');

        $this->container->register('userConfig', Config::class);
        $this->container->setParams(
            'userConfig', [
                ConfigInterface::class => UserConfig::class,
            ]
        );
    }
}