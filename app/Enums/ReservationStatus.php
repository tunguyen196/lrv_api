<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ReservationStatus extends Enum
{
    const DONE = 1;
    const WAITING = 2;
}
