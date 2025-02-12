<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\KegiatanStatus;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\KegiatanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use App\Filament\Resources\KegiatanResource\RelationManagers;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama_kegiatan')
                        ->label('Nama Kegiatan')
                        ->placeholder('Silahkan Masukan Nama Kegiatan')
                        ->required(),
                        TextInput::make('waktu_pelaksanaan')
                        ->label('Waktu Pelaksanaan')
                        ->placeholder('Silahkan Masukan Waktu Pelaksanaanya')
                        ->required(),
                        TextInput::make('waktu_selesai')
                        ->label('Waktu Selesai')
                        ->placeholder('Silahkan Masukan Waktu Kegiatan Selesai')
                        ->required(),
                        ToggleButtons::make('status')
                        ->inline()
                        ->options(KegiatanStatus::class)
                        ->required(),
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
                                    TextColumn::make('nama_kegiatan')
                                        ->searchable()
                                        ->label('Nama Kegiatan')
                                        ->weight(FontWeight::Medium)
                                        ->size(TextColumnSize::Large),
                                ])->grow(false)
                                ]),
                            Split::make([
                                TextColumn::make('waktu_pelaksanaan')
                                    ->searchable()
                                    ->label('Waktu Pelaksanaan'),
                                    // ->hidden(),
                                TextColumn::make('waktu_selesai')
                                    ->searchable()
                                    ->label('Waktu Selesai'),
                                    // ->hidden(),
                                TextColumn::make('status')
                                    ->searchable()
                                    ->label('Status Saat Ini')
                                    ->badge()
                                    ->hidden(),
                            ])->from('md'),
                    ]),
            ])
            ->contentGrid(['md' => 2,'xl' => 3,])
            ->paginationPageOptions([9,18,27])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Info')
                ->label(('Informasi'))
                ->color('info')
                ->url(route('filament.admin.resources.absensis.index'))
                ->button(),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
