<?php

namespace App\Listeners;

use App\Enums\UserAction as UserActionEnum;
use App\Events\ButtonClicked;
use App\Events\PageViewed;
use App\Services\UserActionService;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Events\Dispatcher;

class UserEventSubscriber
{
    public function __construct(private UserActionService $userActionService)
    {
    }

    public function handleUserLogin(Login $event): void
    {
        $this->userActionService->track($event->user, UserActionEnum::LOGIN);
    }

    public function handleUserLogout(Logout $event): void
    {
        $this->userActionService->track($event->user, UserActionEnum::LOGOUT);
    }

    public function handleUserRegistered(Registered $event): void
    {
        $this->userActionService->track($event->user, UserActionEnum::REGISTER);
    }

    public function handlePageViewed(PageViewed $event): void
    {
        $this->userActionService->track($event->user, UserActionEnum::VIEW_PAGE, $event->value);
    }

    public function handleButtonClicked(ButtonClicked $event): void
    {
        $this->userActionService->track($event->user, UserActionEnum::BUTTON_CLICK, $event->value);
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
            Registered::class => 'handleUserRegistered',
            PageViewed::class => 'handlePageViewed',
            ButtonClicked::class => 'handleButtonClicked',
        ];
    }
}
