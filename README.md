# Pterodactyl application PHP SDK
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)

## Quick start

To install the SDK in your project you need to require the package via [composer](http://getcomposer.org):

```bash
composer require skhr/ptero-application-sdk
```

Then use Composer's autoload unless you are using a framework that support composer autoload:

```php
require_once("vendor/autoload.php");
```

Finally, create an instance of the SDK:

```php
use \SKHR\PteroAPI\PteroAPI;

$pteroAPI = new PteroAPI("<baseURI>", "<apiKey>");
```

You can then call the application API.

## Usage

Documentation in progress

## Support

You can get support by [submitting new issue](https://github.com/Loyto-SKHR/ptero-application-sdk/issues/new).

## License

`skhr/ptero-application-sdk` is licensed under the MIT License (MIT). 
Please see the [license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/skhr/ptero-application-sdk.svg
[ico-downloads]: https://img.shields.io/packagist/dt/skhr/ptero-application-sdk.svg
[ico-license]: https://img.shields.io/badge/license-MIT-green.svg

[link-packagist]: https://packagist.org/packages/skhr/ptero-application-sdk
[link-downloads]: https://packagist.org/packages/skhr/ptero-application-sdk
