<?php
namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SantriStatus: string implements HasLabel, HasColor
{
    case Tarbiyah = 'tarbiyah';
    case Skill = 'skill';
    case Khidmat = 'khidmat';
    case Magang = 'magang';
    case Berkarya = 'berkarya';
    case Keluar = 'keluar';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Tarbiyah  => 'Tarbiyah',
            self::Skill => 'Skill',
            self::Khidmat => 'Khidmat',
            self::Magang => 'Magang',
            self::Berkarya => 'Berkarya',
            self::Keluar => 'Keluar',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::Tarbiyah => 'gray',
            self::Skill => 'warning',
            self::Khidmat => 'success',
            self::Magang => 'primary',
            self::Berkarya => 'info',
            self::Keluar => 'danger'
        };
    }
}
