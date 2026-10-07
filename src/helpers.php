<?php

use JeffersonGoncalves\Clarity\Settings\ClaritySettings;

if (! function_exists('clarity_settings')) {
    function clarity_settings(): ClaritySettings
    {
        return app(ClaritySettings::class);
    }
}
