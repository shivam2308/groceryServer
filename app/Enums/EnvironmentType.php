<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EnvironmentType extends Enum
{
    const DEVEL = 0;
    const PROD =   1;
}
