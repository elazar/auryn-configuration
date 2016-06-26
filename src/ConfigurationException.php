<?php

namespace Elazar\Auryn\Configuration;

class ConfigurationException extends \RuntimeException
{
    const ERR_CLASS_DOES_NOT_EXIST = 1;
    const ERR_CLASS_MISSING_INTERFACE = 2;

    public static function classDoesNotExist($class)
    {
        return new static(
            sprintf(
                'Class does not exist: %s',
                $class
            ),
            static::ERR_CLASS_DOES_NOT_EXIST
        );
    }

    public static function classMissingInterface($class)
    {
        return new static(
            sprintf(
                'Class does not implement %s: %s',
                ConfigurationInterface::class,
                $class
            ),
            static::ERR_CLASS_MISSING_INTERFACE
        );
    }
}
