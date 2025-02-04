<?php

namespace App\Filament\Exports;

use App\Models\Guru;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class GuruExporter extends Exporter
{
    protected static ?string $model = Guru::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nama_guru'),
            ExportColumn::make('jenis_kelamin'),
            ExportColumn::make('guru_matpel'),
            ExportColumn::make('pend_akhir'),
            ExportColumn::make('tanggal_lahir'),
            ExportColumn::make('tempat_lahir'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your guru export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
