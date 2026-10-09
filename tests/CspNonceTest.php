<?php

use Illuminate\Support\Facades\Vite;
use JeffersonGoncalves\Clarity\Settings\ClaritySettings;

it('stamps the CSP nonce on every script tag', function () {
    Vite::useCspNonce('test-nonce');
    $settings = app(ClaritySettings::class);
    $settings->project_id = 'abcd1234ef';
    $settings->save();
    $html = (string) $this->blade('@include("clarity::script")');

    preg_match_all('/<script\b[^>]*>/', $html, $tags);

    expect($tags[0])->not->toBeEmpty()->each->toContain('nonce="test-nonce"');
});

it('renders no nonce attribute when the app uses none', function () {
    $settings = app(ClaritySettings::class);
    $settings->project_id = 'abcd1234ef';
    $settings->save();
    $html = (string) $this->blade('@include("clarity::script")');

    expect($html)->toContain('<script')->not->toContain('nonce=');
});
