<?php

use JeffersonGoncalves\Clarity\Facades\Clarity;
use JeffersonGoncalves\Clarity\Settings\ClaritySettings;

it('can resolve ClaritySettings from the container', function () {
    expect(app(ClaritySettings::class))->toBeInstanceOf(ClaritySettings::class);
});

it('has no project id by default', function () {
    expect(app(ClaritySettings::class)->project_id)->toBeNull()
        ->and(app(ClaritySettings::class)->hasValidProjectId())->toBeFalse();
});

it('can update and persist settings', function () {
    $settings = app(ClaritySettings::class);
    $settings->project_id = 'abcd1234ef';
    $settings->save();

    expect(app(ClaritySettings::class)->project_id)->toBe('abcd1234ef')
        ->and(app(ClaritySettings::class)->hasValidProjectId())->toBeTrue();
});

it('belongs to the clarity group', function () {
    expect(ClaritySettings::group())->toBe('clarity');
});

it('can be accessed via the helper function', function () {
    expect(clarity_settings())->toBeInstanceOf(ClaritySettings::class);
});

it('reads a persisted value through the Facade', function () {
    $settings = app(ClaritySettings::class);
    $settings->project_id = 'zyx987';
    $settings->save();

    expect(Clarity::getFacadeRoot()->project_id)->toBe('zyx987');
});
