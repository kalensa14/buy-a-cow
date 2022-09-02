<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Enum\TrackableValueInterface;
use App\Enums\UserAction as UserActionEnum;
use App\Models\User;
use App\Models\UserAction;
use Illuminate\Contracts\Auth\Authenticatable;

class UserActionService
{
    public function track(User|Authenticatable $user, UserActionEnum $action, TrackableValueInterface $value = null): void
    {
        UserAction::create([
            'action' => $action,
            'user_id' => $user->id,
            'value' => $value?->value(),
        ]);
    }
}
