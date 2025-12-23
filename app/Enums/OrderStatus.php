<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipping = 'shipping';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processing => 'Approved',
            self::Shipping => 'Shipping',
            self::Completed => 'Completed',
        };
    }
}
