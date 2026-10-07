## Laravel Clarity

### Overview
Injects the Microsoft Clarity tracking tag into Blade layouts. The project ID is stored in the database with `spatie/laravel-settings` (`ClaritySettings`, group `clarity`) — no config file, no `.env`.

### Usage

@verbatim
<code-snippet name="blade-include" lang="blade">
@include('clarity::script')
</code-snippet>
@endverbatim

@verbatim
<code-snippet name="set-project-id" lang="php">
$settings = clarity_settings();
$settings->project_id = 'abcd1234ef';
$settings->save();
</code-snippet>
@endverbatim

### Conventions
- Namespace: `JeffersonGoncalves\Clarity`; view namespace `clarity` (`clarity::script`)
- The tag renders only when `project_id` is set and alphanumeric (`ClaritySettings::hasValidProjectId()`)
- Publish migrations with `php artisan vendor:publish --tag=clarity-settings-migrations`
