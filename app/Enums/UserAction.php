<?php

namespace App\Enums;

enum UserAction: string
{
    case LOGIN = 'login';
    case LOGOUT = 'logout';
    case REGISTER = 'register';
    case VIEW_PAGE = 'view-page';
    case BUTTON_CLICK = 'button-click';
}
