<?php

namespace App\Enums;

use App\Contracts\Enum\TrackableValueInterface;

enum PageViewValue: string implements TrackableValueInterface
{
    case DASHBOARD = 'A';
    case DOWNLOAD = 'B';
    case UNKNOWN = 'unknown';

    public function value(): string
    {
        return $this->value;
    }

    public static function fromPageName(string $pageName): self
    {
        foreach (self::cases() as $case) {
            if ($case->name === strtoupper($pageName)) {
                return $case;
            }
        }

        return self::UNKNOWN;
    }
}
