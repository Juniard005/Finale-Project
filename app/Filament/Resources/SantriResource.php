<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Santri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Exports\SantriExporter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\SantriResource\Pages;

class SantriResource extends Resource
{
    protected static ?string $model = Santri::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Data Santri';

    protected static ?string $navigationGroup = 'Academic';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama')
                        ->placeholder('Tolong Masukin Nama Anda')
                        ->required(),
                        Select::make('jenis_kelamin')
                        ->options([
                            'Pria' => 'Laki-laki',
                            'Wanita' => 'Perempuan',
                        ])
                        ->placeholder('Pilih Jenis Kelamin Anda')
                        ->required(),
                        TextInput::make('tempat_lahir')
                        ->required(),
                        DatePicker::make('tanggal_lahir')
                        ->required(),
                        TextInput::make('no_hp')
                        ->numeric()
                        ->required(),
                        Textarea::make('alamat')
                        ->required(),
                        TextInput::make('nama_ayah')
                        ->required(),
                        TextInput::make('nama_ibu')
                        ->required(),
                        Select::make('pekerjaans_id')
                        ->label('Pekerjaan Ayah')
                        ->relationship('Pekerjaan','nama_pekerjaan')
                        ->required(),
                        Select::make('kelas_id')
                        ->label('Kelas')
                        ->relationship('Kelas','nama_kelas')
                        ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama'),
                TextColumn::make('jenis_kelamin')
                    ->searchable()
                    ->label('Jenis Kelamin'),
                TextColumn::make('tempat_lahir')
                    ->searchable()
                    ->label('Tempat Lahir'),
                TextColumn::make('tanggal_lahir')
                    ->searchable()
                    ->label('Tanggal Lahir'),
                TextColumn::make('Kelas.nama_kelas')
                    ->searchable()
                    ->label('Kelas'),
                TextColumn::make('no_hp')->hidden(),
                TextColumn::make('alamat')->hidden(),
                TextColumn::make('nama_ayah')->hidden(),
                TextColumn::make('nama_ibu')->hidden(),
                TextColumn::make('Pekerjaan.nama_pekerjaan')->hidden(),
            ])
            ->contentGrid([
                'md' => 1,
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->headerActions([
                ExportBulkAction::make()->exporter(SantriExporter::class),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exporter(SantriExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(SantriExporter::class)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // WalisantriRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSantris::route('/'),
            'create' => Pages\CreateSantri::route('/create'),
            'edit' => Pages\EditSantri::route('/{record}/edit'),
            // 'show' => Pages\ShowSantri::route('/show/{id}')
        ];
    }
}
