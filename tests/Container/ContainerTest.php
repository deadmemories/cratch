<?php

require __DIR__.'/../bootstrap.php';

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @var \Cratch\Container\ServiceContainer
     */
    private $container;

    public function setUp()
    {
        parent::setUp();

        $this->container = \Cratch\Container\ServiceContainer::getInstance();
    }

    public function testRegister()
    {
        $this->assertNull($this->container->register('SomeClass', stdClass::class));
        $this->assertNull($this->container->register(\Cratch\Config\Config::class));
    }

    public function testRegisterSingleton()
    {
        $this->assertNull($this->container->registerSingleton('SomeClass1', stdClass::class));
        $this->assertNull($this->container->registerSingleton(\Cratch\Config\UserConfig::class));
    }

    public function testHasClasses()
    {
        $this->assertFalse($this->container->has('alias_name'));
        $this->assertFalse($this->container->has(\Cratch\Support\Files::class));

        $this->assertTrue($this->container->has('SomeClass'));
        $this->assertTrue($this->container->has(\Cratch\Config\Config::class));
    }

    /**
     * @depends testSetParams
     */
    public function testMake()
    {
        $this->assertInstanceOf(stdClass::class, $this->container->make('SomeClass1'));
        $this->assertInstanceOf(\Cratch\Config\Config::class, $this->container->make(\Cratch\Config\Config::class));
    }

    public function testSetParams()
    {
        $this->assertNull($this->container->setParams(\Cratch\Config\Config::class, [
            \Cratch\Contracts\Config\ConfigInterface::class => \Cratch\Config\UserConfig::class
        ]));
    }
}
