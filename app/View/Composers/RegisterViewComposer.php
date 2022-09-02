<?php

namespace App\View\Composers;

use App\Enums\PageViewValue;
use App\Events\PageViewed;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterViewComposer
{
    public function compose(View $view): void
    {
        event(new PageViewed(Auth::user(), PageViewValue::fromPageName($view->getName())));
    }
}
