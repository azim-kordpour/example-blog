<?php

namespace App\Enums;

use AzimKordpour\PowerEnum\Traits\PowerEnum;

/**
 * @method bool isNew()
 * @method bool isAnswered()
 */
enum ContactStatus: string
{
    use PowerEnum;

    case New = 'New';

    case Answered = 'Answered';
}
