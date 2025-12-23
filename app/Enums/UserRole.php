<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Seller = 'seller';
    case User = 'user';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::Seller => 'Seller',
            self::User => 'User',
        };
    }
}
