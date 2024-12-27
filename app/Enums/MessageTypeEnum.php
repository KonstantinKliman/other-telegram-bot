<?php

namespace App\Enums;

enum MessageTypeEnum : string
{
    case START_MESSAGE = "start";

    case SECOND_MESSAGE = "second";

    case LAST_MESSAGE = 'last';
}
