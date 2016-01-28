# zero-module-html5

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gwa/zero-module-html5.svg?style=flat-square)](https://packagist.org/packages/gwa/zero-module-html5)
[![Total Downloads](https://img.shields.io/packagist/dt/gwa/zero-module-html5.svg?style=flat-square)](https://packagist.org/packages/gwa/zero-module-html5)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

## Master

[![Build Status](https://img.shields.io/travis/gwa/zero-module-html5/master.svg?style=flat-square)](https://travis-ci.org/gwa/zero-module-html5)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/gwa/zero-module-html5/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/zero-module-html5/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/gwa/zero-module-html5/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/zero-module-html5)

## Install

Via Composer

``` bash
$ composer require gwa/zero-module-html5
```

## Usage

Add it to the getModuleClasses function.

``` php
    protected function getModuleClasses()
    {
        return [
            'Gwa\Wordpress\Zero\Module\Html5Module',
        ];
    }
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email bannert@greatwhiteark.com instead of using the issue tracker.

## Credits

- [Daniel Bannert](https://github.com/prisis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
