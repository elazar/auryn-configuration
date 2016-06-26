<?php

namespace Elazar\Auryn\Configuration;

use Auryn\Injector;

class ConfigurationSet implements ConfigurationInterface
{
    /**
     * @var array
     */
    protected $classes;

    public function __construct(array $classes)
    {
        foreach ($classes as $class) {
            if (!class_exists($class)) {
                throw ConfigurationException::classDoesNotExist($class);
            }
            if (!is_subclass_of($class, ConfigurationInterface::class)) {
                throw ConfigurationException::classMissingInterface($class);
            }
        }
        $this->classes = $classes;
    }
    
    public function __invoke(Injector $injector)
    {
        $injector->share($injector);

        foreach ($this->classes as $class) {
            $injector->execute($class);
        }
    }
}
