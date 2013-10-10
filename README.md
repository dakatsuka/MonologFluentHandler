# MonologFluentHandler [![Build Status](https://travis-ci.org/dakatsuka/MonologFluentHandler.png?branch=master)](https://travis-ci.org/dakatsuka/MonologFluentHandler)

Fluentd Handler for Monolog

## Installation

Add this lines to your composer.json:

```json
{
    "require": {
        "dakatsuka/monolog-fluent-handler": "1.0.0"
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

Copyright (C) 2013 Dai Akatsuka, released under the MIT License.
