<?php

namespace App\Filament\Resources;

use DateTime;
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
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\AbsensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AbsensiResource\RelationManagers;
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
                        TextInput::make('nama_kegiatan')
                        ->label('Nama Kegiatan')
                        ->placeholder('Tolong Masukin Nama Kegiatanya Apa?')
                        ->required(),
                        DatePicker::make('waktu_kegiatan')
                        ->label('Waktu Pelaksanaan')
                        ->placeholder('Tolong Waktu Dilaksanakan Kegiatan!')
                        ->required(),
                        ToggleButtons::make('status')
                        ->inline()
                        ->options(AbsensiStatus::class)
                        ->required(),
                        Select::make('gurus_id')
                        ->label('Nama Wali Kelas')
                        ->relationship('Guru','nama_guru')
                        ->placeholder('Nama Wali Kelas Siapa?')
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Grid::make()
                    ->columns(columns:1)
                    ->schema([
                        Split::make([
                            Grid::make()
                                ->columns(columns:1)
                                ->schema([
                                    TextColumn::make('santri.nama')
                                        ->searchable()
                                        ->label('Nama Santri')
                                        ->width(120)
                                ])->grow(false)
                            ]),
                            Stack::make([
                                TextColumn::make('nama_kegiatan')
                                    ->searchable()
                                    ->label('Nama Kegiatan'),
                                TextColumn::make('waktu_kegiatan')
                                    ->searchable()
                                    ->label('Waktu Pelaksanaan'),
                                TextColumn::make('status')
                                    ->searchable()
                                    ->label('Status Saat Ini')
                                    ->badge(),
                                TextColumn::make('Guru.nama_guru')
                                    ->searchable()
                                    ->label('Nama Wali Kelas')
                            ]),
                    ]),
            ])
            ->contentGrid(['md' => 2,'xl' => 3,])
            ->paginationPageOptions([9,18,27])
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
