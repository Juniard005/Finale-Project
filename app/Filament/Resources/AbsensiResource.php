<?php

namespace App\Filament\Resources;

use DateTime;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Absensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\CheckboxColumn;
use App\Filament\Resources\AbsensiResource\Pages;
use App\Enums\AbsensiStatus; // Ensure this class exists in the specified namespace

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationLabel = 'Absensi Kegiatan';

    protected static ?string $navigationGroup = 'Konfirgurasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('santris_id')
                        ->label('Nama Santri')
                        ->relationship('santri','nama')
                        ->required(),
                        DatePicker::make('tanggal')
                        ->label('Tanggal')
                        ->required(),
                        Select::make('status')
                        ->columns(2)
                        ->options(AbsensiStatus::class),
                        Select::make('periodes_id')
                        ->label('Nama Angkatan')
                        ->relationship('Periode','nama_angkatan')
                        ->placeholder('Tolong Isi Nama Angkatan Anda?')
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        $daysInMonth = Carbon::now()->daysInMonth;

        return $table
            ->columns([
                TextColumn::make('santri.nama')
                ->label('Nama Santri')
                ->sortable(),
                TextColumn::make('Periode.nama_angkatan')
                ->label('Nama Angkatan')
                ->sortable(),

                // Generate kolom tanggal secara dinamis
                ...collect(range(1, $daysInMonth))->map(fn ($day) =>
                    TextColumn::make("absensi_$day")
                        ->label(str_pad($day, 2, '0', STR_PAD_LEFT))
                        ->getStateUsing(function ($record) use ($day) {
                            $tanggal = Carbon::now()->startOfMonth()->addDays($day - 1)->toDateString();
                            $absen = Absensi::where('santris_id', $record->santris_id)
                            ->where('tanggal', $tanggal)
                            ->first();
                            return $absen ? $absen->status : '?';
                        })
                        ->sortable()
                )->toArray(),
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
