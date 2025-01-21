<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kelas;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KelasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KelasResource\RelationManagers;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationLabel = 'Kelas';

    protected static ?string $navigationGroup = 'Academic';

    protected static ?int $navigationSort = 13;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama_kelas')
                            ->required(),
                        TextInput::make('jurusan')
                            ->required(),
                        TextInput::make('kapasitas')
                            ->numeric()
                            ->required(),
                        TextInput::make('kode_kelas')
                            ->numeric()
                            ->required(),
                        Select::make('gurus_id')
                            ->label('Wali Kelas')
                            ->relationship('Guru','nama_guru')
                            ->required(),
                        Select::make('periodes_id')
                            ->label('Periode')
                            ->relationship('Periode','name_periode')
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
               TextColumn::make('jurusan')
                    ->searchable()
                    ->label('Jurusan'),
               TextColumn::make('kapasitas')
                    ->searchable()
                    ->label('Kapasitas'),
               TextColumn::make('Guru.nama_guru')
                    ->searchable()
                    ->label('Wali Kelas'),
                TextColumn::make('Periode.name_periode')
                    ->searchable()
                    ->label('Periode'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
