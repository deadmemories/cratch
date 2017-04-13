<?php

require __DIR__.'/../bootstrap.php';

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        app()->register('collection', \Cratch\Collection\Collection::class);
    }

    public function testRegister()
    {
        $this->assertNull(
            app()->register('SomeClass', stdClass::class)
        );

        $this->assertNull(
            app()->register(\Cratch\Config\Config::class)
        );
    }

    public function testRegisterSingleton()
    {
        $this->assertNull(
            app()->registerSingleton('SomeClass1', stdClass::class)
        );

        $this->assertNull(
            app()->registerSingleton(\Cratch\Config\UserConfig::class)
        );
    }

    public function testHasClasses()
    {
        $this->assertFalse(app()->has('alias_name'));
        $this->assertFalse(app()->has(\Cratch\Support\Files::class));

        $this->assertTrue(app()->has('SomeClass'));
        $this->assertTrue(app()->has(\Cratch\Config\Config::class));
    }

    /**
     * @depends testSetParams
     */
    public function testMake()
    {
        $this->assertInstanceOf(
            stdClass::class,
            app()->make('SomeClass1')
        );

        $this->assertInstanceOf(
            \Cratch\Config\Config::class,
            app()->make(\Cratch\Config\Config::class)
        );
    }

    public function testSetParams()
    {
        $this->assertNull(
            app()->setParams(
                \Cratch\Config\Config::class, [
                    \Cratch\Contracts\Config\ConfigInterface::class => \Cratch\Config\UserConfig::class,
                ]
            )
        );
    }
}
