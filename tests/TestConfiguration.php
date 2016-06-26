<?php

namespace Elazar\Auryn\Configuration;

use Auryn\Injector;

class TestConfiguration implements ConfigurationInterface
{
    public function __invoke(Injector $injector)
    {
        $injector->alias(\Iterator::class, \EmptyIterator::class);
    }
}
