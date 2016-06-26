# elazar/auryn-configuration

Modularized configurations for the [Auryn](https://github.com/rdlowrey/Auryn) dependency injector

## License

This library is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Installation

Use [composer](https://getcomposer.org/).

```
composer require elazar/auryn-configuration
```

## Usage

Individual configurations are defined like so:

```php
use Auryn\Injector;
use Elazar\Auryn\Configuration\ConfigurationInterface;

class FooConfiguration implements ConfigurationInterface
{
    public function __invoke(Injector $injector)
    {
        // ...
    }
}
```

These configurations can be grouped into reusable sets like so:

```php
use Elazar\Auryn\Configuration\ConfigurationSet;

class AcmeConfigurationSet extends ConfigurationSet
{
    public function __construct()
    {
        parent::__construct([
            FooConfiguration::class,
            BarConfiguration::class,
            // ...
        ]);
    }
}
```

Individual configurations and configuration sets are applied to injectors in the same way:

```php
$injector = new Injector;

$configuration = $injector->make(FooConfiguration::class);
$configuration($injector);

$set = $injector->make(AcmeConfigurationSet::clss);
$set($injector);
```

## Development

To run the PHPUnit test suite:

```
composer run-script test
```
