---
name: clarity-development
description: Add Microsoft Clarity (heatmaps, session recordings) to a Laravel app with jeffersongoncalves/laravel-clarity — Blade include, database-stored project ID via spatie/laravel-settings.
---

# Laravel Clarity Development

## When to use this skill

- Adding Microsoft Clarity tracking to a Laravel / Blade app
- Changing the Clarity project ID at runtime (admin panel, seeder, tinker)
- Debugging why the Clarity tag doesn't show up

## Setup

```bash
composer require jeffersongoncalves/laravel-clarity
php artisan vendor:publish --tag=clarity-settings-migrations
php artisan migrate
```

```blade
{{-- resources/views/layouts/app.blade.php, inside <head> --}}
@include('clarity::script')
```

```php
$settings = clarity_settings();
$settings->project_id = 'abcd1234ef'; // Clarity > Settings > Setup
$settings->save();
```

## Settings

| Setting | Type | Default |
|---------|------|---------|
| `project_id` | `?string` | `null` |

## Troubleshooting

- **No tag in the HTML**: `project_id` is empty or not alphanumeric — check `clarity_settings()->hasValidProjectId()`.
- **Settings not found**: run the settings migration (`php artisan migrate` after publishing).
- **Filament panel**: use `jeffersongoncalves/filament-clarity`, which injects the same view into panels and adds a settings page.
