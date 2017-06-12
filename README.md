# Doctrine integration for Money

Integration between [moneyphp/money](https://github.com/moneyphp/money) and
[Doctrine ORM](https://github.com/doctrine2/doctrine).


## Install

Via Composer

``` bash
$ composer require moneyphp/money-doctrine
```

## Drivers

This package provides XML, YAML and Fluent implementations, feel free to use
the one that suits your project.

```php
// XML
$configuration = Setup::createXMLMetadataConfiguration([
    // your mappings...
    '/path/to/vendor/moneyphp/doctrine-money/src/xml',
]);

// YAML
$configuration = Setup::createYAMLMetadataConfiguration([
    // your mappings...
    '/path/to/vendor/moneyphp/doctrine-money/src/yaml',
]);

// Fluent
$fluent = new FluentDriver([
    // your mappings...
    Money\Doctrine\Fluent\MoneyMapping::class,
    Money\Doctrine\Fluent\CurrencyMapping::class,
]);
```
