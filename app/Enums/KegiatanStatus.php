<?php
namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum KegiatanStatus: string implements HasLabel
{
    case Aktif = 'aktif';
    case TIDAK_AKTIF = 'tidak_aktif';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Aktif => 'Aktif',
            self::TIDAK_AKTIF => 'Tidak Aktif',
        };
    }
}
