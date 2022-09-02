<?php

namespace App\Events;

use App\Enums\ButtonClickValue;
use App\Models\User;
use Illuminate\Queue\SerializesModels;

class ButtonClicked
{
    use SerializesModels;

    public function __construct(public User $user, public ButtonClickValue $value)
    {
    }
}
