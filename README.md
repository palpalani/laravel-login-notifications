# Laravel Login Notifications
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
