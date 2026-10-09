<div class="filament-hidden">

![Laravel Clarity](https://raw.githubusercontent.com/jeffersongoncalves/laravel-clarity/main/art/jeffersongoncalves-laravel-clarity.png)

</div>

# Laravel Clarity

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/laravel-clarity.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-clarity)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/laravel-clarity/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/laravel-clarity/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/laravel-clarity.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-clarity)

Add [Microsoft Clarity](https://clarity.microsoft.com) — free heatmaps, session recordings and insights — to your Laravel app. The project ID is stored in the database with [spatie/laravel-settings](https://github.com/spatie/laravel-settings), so you can change it at runtime (e.g. from an admin panel) instead of in `.env`.

For a Filament settings page, use [jeffersongoncalves/filament-clarity](https://github.com/jeffersongoncalves/filament-clarity).

## Installation

```bash
composer require jeffersongoncalves/laravel-clarity
```

Publish and run the settings migration:

```bash
php artisan vendor:publish --tag=clarity-settings-migrations
php artisan migrate
```

## Configuration

Copy the project ID from Clarity (**Settings > Setup**) and save it:

```php
use JeffersonGoncalves\Clarity\Settings\ClaritySettings;

$settings = app(ClaritySettings::class);
$settings->project_id = 'abcd1234ef';
$settings->save();
```

Or with the helper or the Facade:

```php
$settings = clarity_settings();
$settings->project_id = 'abcd1234ef';
$settings->save();

use JeffersonGoncalves\Clarity\Facades\Clarity;

$projectId = Clarity::getFacadeRoot()->project_id;
```

### Available settings

| Setting | Type | Default | Description |
|---------|------|---------|-------------|
| `project_id` | `?string` | `null` | Your Clarity project ID. The tag only renders when it is set and alphanumeric. |

## Usage

Add the tag to your Blade layout, inside `<head>`:

```blade
@include('clarity::script')
```

Nothing is rendered while the project ID is empty or invalid, so you can ship the include everywhere and enable tracking later.

## Content Security Policy

When your app sets a CSP nonce through Laravel's Vite (`Vite::useCspNonce()`, as [laravel-security-headers](https://github.com/jeffersongoncalves/laravel-security-headers) does), every `<script>` this package renders carries it, so a `script-src 'self' 'nonce-{nonce}'` policy works without `'unsafe-inline'`. Scripts loaded afterwards from the vendor's own CDN still need that host in `script-src` (and its API in `connect-src`).

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
