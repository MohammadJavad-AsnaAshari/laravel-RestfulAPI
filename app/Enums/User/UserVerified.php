<?php

namespace App\Enums\User;

enum UserVerified: string
{
    case VERIFIED_USER = '1';
    case UNVERIFIED_USER = '0';
}
