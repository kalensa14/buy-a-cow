<?php

namespace Tests\Unit\Listeners;

use App\Enums\UserAction as UserActionEnum;
use App\Listeners\UserEventSubscriber;
use App\Models\User;
use App\Services\UserActionService;
use Illuminate\Auth\Events\Login as LoginEvent;
use Mockery\MockInterface;
use Tests\TestCase;

class UserEventSubscriberTest extends TestCase
{


    public function test_when_login_event_and_correspond_action_tracked(): void
    {
        $user = new User();

        /** @var UserActionService|MockInterface $serviceMock */
        $serviceMock = $this->mock(UserActionService::class, function (MockInterface $mock) use ($user) {
            $mock->allows('track')
                ->with($user, UserActionEnum::LOGIN)
                ->once();
        });

        $event = new LoginEvent('web', $user, false);
        (new UserEventSubscriber($serviceMock))->handleUserLogin($event);
    }
}
