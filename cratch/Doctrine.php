<?php

namespace Cratch;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Doctrine
{
    protected static $paths = [__DIR__.'/models'];

    protected static $isDevMode = true;

    protected static $data = [
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'dbname' => 'symfony',
        'user' => 'mysql',
        'password' => 'mysql',
    ];

    public function init()
    {
        $config = Setup::createConfiguration(self::$isDevMode);
        $driver = new AnnotationDriver(new AnnotationReader(), self::$paths);

        AnnotationRegistry::registerLoader('class_exists');
        $config->setMetadataDriverImpl($driver);

        $em = EntityManager::create(self::$data, $config);

        return $em;
    }
}