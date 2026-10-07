<?php

namespace JeffersonGoncalves\Clarity\Facades;

use Illuminate\Support\Facades\Facade;
use JeffersonGoncalves\Clarity\Settings\ClaritySettings;

/**
 * @property ?string $project_id
 *
 * @see ClaritySettings
 */
class Clarity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ClaritySettings::class;
    }
}
