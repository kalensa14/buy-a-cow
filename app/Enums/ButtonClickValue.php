<?php

namespace App\Enums;

use App\Contracts\Enum\TrackableValueInterface;

enum ButtonClickValue: string implements TrackableValueInterface
{
    case BUY = 'Buy a cow';
    case DOWNLOAD = 'Download';

    public function value(): string
    {
        return $this->value;
    }
}
