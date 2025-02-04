<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\JadBel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Exports\JadBelExporter;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\JadBelResource\Pages;

class JadBelResource extends Resource
{
    protected static ?string $model = JadBel::class;

    // protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Jadwal Belajar';

    protected static ?string $navigationGroup = 'Academic';

    protected static ?int $navigationSort = 14;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                  TextInput::make('kode_kelas')
                        ->label('Kode Kelas')
                        ->required(),
                  TextInput::make('nama_kelas')
                        ->label('Nama Kelas')
                        ->required(),
                  Select::make('periodes_id')
                        ->label('Periode')
                        ->relationship('Periode','name_periode')
                        ->required(),
                  Select::make('gurus_id')
                        ->label('Guru')
                        ->relationship('Guru','nama_guru')
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_kelas')
                    ->searchable()
                    ->label('Kode Kelas'),
                TextColumn::make('nama_kelas')
                    ->searchable()
                    ->label('Nama Kelas'),
                TextColumn::make('Periode.name_periode')
                    ->searchable()
                    ->label('Periode'),
                TextColumn::make('Guru.nama_guru')
                    ->searchable()
                    ->label('Guru'),
            ])
            ->contentGrid([
                'md' => 1,
            ])
            ->striped()
            ->filters([
                // SelectFilter::make('nama_kelas')
                //     ->options(JadBel::pluck('nama_kelas'))
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exporter(JadBelExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(JadBelExporter::class)
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
            'index' => Pages\ListJadBels::route('/'),
            'create' => Pages\CreateJadBel::route('/create'),
            'edit' => Pages\EditJadBel::route('/{record}/edit'),
        ];
    }
}
