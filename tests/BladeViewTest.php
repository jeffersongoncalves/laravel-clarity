<?php

use JeffersonGoncalves\Clarity\Settings\ClaritySettings;

it('renders the Clarity tag when the project id is set', function () {
    $settings = app(ClaritySettings::class);
    $settings->project_id = 'abcd1234ef';
    $settings->save();

    $this->blade('@include("clarity::script")')
        ->assertSee('https://www.clarity.ms/tag/', false)
        ->assertSee("\"clarity\", \"script\", 'abcd1234ef'", false);
});

it('does not render the tag when the project id is empty', function () {
    $settings = app(ClaritySettings::class);
    $settings->project_id = null;
    $settings->save();

    $this->blade('@include("clarity::script")')->assertDontSee('clarity.ms', false);
});

it('does not render an invalid project id into the script', function () {
    $settings = app(ClaritySettings::class);
    $settings->project_id = 'abc"); alert(1); ("';
    $settings->save();

    $this->blade('@include("clarity::script")')
        ->assertDontSee('clarity.ms', false)
        ->assertDontSee('alert(1)', false);
});
