<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Pages\CreateGuru;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\GuruResource\Pages;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Guru Atau Pengajar';

    protected static ?string $navigationGroup = 'Academic';

    protected static ?int $navigationSort = 12;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama_guru')
                            ->label('Nama Guru')
                            ->required(),
                        Select::make('jenis_kelamin')
                            ->options([
                                'Pria' => 'Laki-laki',
                                'Wanita' => 'Perempuan',
                            ])
                            ->placeholder('Pilih Jenis Kelamin')
                            ->label('Jenis Kelamin')
                            ->required(),
                        TextInput::make('guru_matpel')
                            ->label('Guru Mata Pelajaran')
                            ->required(),
                        TextInput::make('pend_akhir')
                            ->label('Pendidikan Terakhir')
                            ->required(),
                        TextInput::make('tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required(),
                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_guru')
                    ->searchable()
                    ->label('Nama Guru'),
                TextColumn::make('jenis_kelamin')
                    ->searchable()
                    ->label('Jenis Kelamin'),
                TextColumn::make('guru_matpel')
                    ->searchable()
                    ->label('Guru Mata Pelajaran'),
                TextColumn::make('pend_akhir')
                    ->searchable()
                    ->label('Pendidikan Terakhir'),
                TextColumn::make('tempat_lahir')->hidden(),
                TextColumn::make('tanggal_lahir')->hidden(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
