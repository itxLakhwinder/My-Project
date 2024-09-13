<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DeliveryStatus extends Enum
{
    const Pending = 'pending';
    const Accepted = 'accepted';
    const Inprocess = 'inprocess';
    const Delivered = 'delivered';
    const Cancelled = 'cancelled';
}
