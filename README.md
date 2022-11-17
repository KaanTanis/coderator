# Simple unique code generator with optional configurations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kaantanis/coderator.svg?style=flat-square)](https://packagist.org/packages/kaantanis/coderator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kaantanis/coderator/run-tests?label=tests)](https://github.com/kaantanis/coderator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kaantanis/coderator/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/kaantanis/coderator/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kaantanis/coderator.svg?style=flat-square)](https://packagist.org/packages/kaantanis/coderator)

This package provides a simple unique code generator with optional configurations.
## Installation

You can install the package via composer:

```bash
composer require kaantanis/coderator
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="coderator-config"
```

This is the contents of the published config file:

```php
return [
    'default_length' => 6,
];
```

## Usage

```php
$coderator = new \KaanTanis\Coderator\Coderator();

$my_code = $coderator->model(\App\Models\Product:class)
    ->field('code') // required. For create unique code
    ->prefix('#PR') // optional. default is empty
    ->length(6) // optional. except prefix, default is 6
    ->generate(); // returns a unique code
// $my_code = '#PRAY81QH'

// Without optional configurations
$my_code = $coderator->model(\App\Models\Product:class)
    ->field('code') // required. For create unique code
    ->generate(); // returns a unique code    
// $my_code = '8EYQHG'

// Now you can use it this unique code for your model. E.g. Product model
Product::create([
    'code' => $my_code, // absolute unique code 8EYQHG
    ...
]);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Roadmap
- [ ] Suffix option
- [ ] Maybe created codes will be stored in a database table with a model and field name. So, it will be faster to generate a unique code.
- [ ] More tests
- [ ] More configurations
- [ ] More coffee

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [KaanTanis](https://github.com/KaanTanis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
