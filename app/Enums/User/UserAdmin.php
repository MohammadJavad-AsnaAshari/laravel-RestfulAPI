<?php

namespace App\Enums\User;

enum UserAdmin: string
{
    case ADMIN_USER = 'true';
    case REGULAR_USER = 'false';
}
