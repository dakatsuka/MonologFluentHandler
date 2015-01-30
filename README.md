# MonologFluentHandler [![Build Status](https://travis-ci.org/dakatsuka/MonologFluentHandler.svg?branch=master)](https://travis-ci.org/dakatsuka/MonologFluentHandler)

[![Latest Stable Version](https://poser.pugx.org/dakatsuka/monolog-fluent-handler/v/stable.png)](https://packagist.org/packages/dakatsuka/monolog-fluent-handler)
[![Latest Unstable Version](https://poser.pugx.org/dakatsuka/monolog-fluent-handler/v/unstable.png)](https://packagist.org/packages/dakatsuka/monolog-fluent-handler)

Fluentd Handler for Monolog

## Installation

Add this lines to your composer.json:

```json
{
    "require": {
        "dakatsuka/monolog-fluent-handler": "1.2.0"
    }
}
```

And then execute:

```bash
$ php composer.phar install
```

## Usage

```php
<?php
use Dakatsuka\MonologFluentHandler\FluentHandler;
use Monolog\Logger;

$logger = new Logger('dakatsuka');
$logger->pushHandler(new FluentHandler());

$logger->debug('example.monolog', array('foo' => 'bar'));
$logger->info('example.fluentd', array('fizz' => 'buzz'));

// Fluentd:
// 2013-10-11 01:00:00 +0900 dakatsuka.example.monolog: {"foo":"bar","level":"DEBUG"}
// 2013-10-11 01:00:00 +0900 dakatsuka.example.fluentd: {"fizz":"buzz","level":"INFO"}
```

You can specify the host name and port.
```php
<?php
$logger = new Logger('dakatsuka');
$logger->pushHandler(new FluentHandler(null, '127.0.0.1', 24224));
```

You can specify the FluentLogger object.
```php
<?php
$fluent = new FluentLogger("localhost", 24224);
$logger = new Logger('dakatsuka');
$logger->pushHandler(new FluentHandler($fluent));
```

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

### Test

```bash
$ make phpunit
$ make test
```

## Copyright

Copyright (C) 2013-2015 Dai Akatsuka, released under the MIT License.
