<?php

declare(strict_types=1);

namespace App\Events;

use App\Enums\PageViewValue;
use App\Models\User;
use Illuminate\Queue\SerializesModels;

class PageViewed
{
    use SerializesModels;

    public function __construct(public User $user, public PageViewValue $value)
    {
    }
}
