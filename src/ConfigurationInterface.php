<?php

namespace Elazar\Auryn\Configuration;

use Auryn\Injector;

interface ConfigurationInterface
{
    public function __invoke(Injector $injector);
}
