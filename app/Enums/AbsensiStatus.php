<?php
namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AbsensiStatus: string implements HasLabel, HasColor
{
    case Hadir = 'hadir';
    case Sakit = 'sakit';
    case Izin = 'izin';
    case Alpha = 'alpha';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Hadir  => 'Hadir',
            self::Sakit => 'Sakit',
            self::Izin => 'Izin',
            self::Alpha => 'Alpha',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::Hadir => 'success',
            self::Sakit => 'warning',
            self::Izin => 'info',
            self::Alpha => 'danger',
        };
    }
}
