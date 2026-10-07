<?php

namespace JeffersonGoncalves\Clarity\Settings;

use Spatie\LaravelSettings\Settings;

class ClaritySettings extends Settings
{
    /** Microsoft Clarity project ID (Settings > Setup). Empty = no script. */
    public ?string $project_id;

    public static function group(): string
    {
        return 'clarity';
    }

    public function hasValidProjectId(): bool
    {
        return preg_match('/^[a-z0-9]+$/i', (string) $this->project_id) === 1;
    }
}
