# Laravel Login Notifications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/palpalani/laravel-login-notification.svg?style=flat-square)](https://packagist.org/packages/palpalani/laravel-login-notification)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/palpalani/laravel-login-notification/run-tests?label=tests)](https://github.com/palpalani/laravel-login-notification/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/palpalani/laravel-login-notification/Check%20&%20fix%20styling?label=code%20style)](https://github.com/palpalani/laravel-login-notification/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/palpalani/laravel-login-notification.svg?style=flat-square)](https://packagist.org/packages/palpalani/laravel-login-notification)

A login event notification for Laravel projects. By default, it will send
notification only on production environment only.

### Installation
Install the package using the composer.
```
composer require palpalani/laravel-login-notifications
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="palPalani\LoginNotifications\NotificationServiceProvider" --tag="config"
```

After installation os the package, any login attempts will send the email.

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [palPalani](https://github.com/palpalani)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
