# Changelog

All notable changes to `laravel-clarity` will be documented in this file.

## 1.2.0 - 2026-11-17

### Cookie consent

With [laravel-cookie-consent](https://github.com/jeffersongoncalves/laravel-cookie-consent) 4.6+ installed and `block_scripts` on, the scripts wait until the visitor allows their cookie category (rendered as `type="text/plain" data-category="…"`, run with their CSP nonce once allowed). Nothing changes without it: this package still does not require laravel-cookie-consent.

## 1.1.0 - 2026-10-09

- Every `<script>` rendered by the package carries Laravel's Vite CSP nonce when the app sets one (e.g. via laravel-security-headers), so nonce-based `script-src` policies work without `'unsafe-inline'`.

## 1.0.0 - 2026-10-07

First release.

- `@include('clarity::script')` renders the official Microsoft Clarity tag
- `ClaritySettings` (`project_id`) stored with spatie/laravel-settings; the tag only renders for a non-empty alphanumeric ID
- Project ID escaped with `@js()` inside the script
- `Clarity` facade and `clarity_settings()` helper

Requires PHP 8.2+ and Laravel 12.61+ or 13.
