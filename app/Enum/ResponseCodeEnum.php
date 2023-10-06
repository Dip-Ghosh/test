<?php

namespace App\Enum;

enum ResponseCodeEnum: int
{
    case UNAUTHORIZED = 401;
    case SUCCESS      = 200;
}
