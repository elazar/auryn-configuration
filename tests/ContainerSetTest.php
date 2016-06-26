<?php

namespace Elazar\Auryn\Configuration;

use Auryn\Injector;
use PHPUnit_Framework_TestCase as TestCase;

class ConfigurationSetTest extends TestCase
{
    public function testConstructorWithNonexistentClass()
    {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionCode(ConfigurationException::ERR_CLASS_DOES_NOT_EXIST);
        new ConfigurationSet(['foo']);
    }

    public function testConstructorWithClassMissingInterface()
    {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionCode(ConfigurationException::ERR_CLASS_MISSING_INTERFACE);
        new ConfigurationSet([\stdClass::class]);
    }

    public function testInvoke()
    {
        $injector = new Injector;
        $set = new ConfigurationSet([TestConfiguration::class]);
        $set($injector);

        $this->assertSame($injector, $injector->make(Injector::class));
        $this->assertInstanceOf(\EmptyIterator::class, $injector->make(\Iterator::class));
    }
}
