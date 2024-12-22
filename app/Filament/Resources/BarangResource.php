<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),
                Select::make('id_kategori')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required(),
                Textarea::make('spesifikasi')
                    ->label('Spesifikasi')
                    ->maxLength(500),
                Select::make('kondisi')
                    ->label('Kondisi')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak Ringan' => 'Rusak Ringan',
                        'Rusak Berat' => 'Rusak Berat',
                    ])
                    ->required(),
                DatePicker::make('tanggal_pengadaan')
                    ->label('Tanggal Pengadaan')
                    ->required(),
                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->searchable(),
                TextColumn::make('spesifikasi')
                    ->label('Spesifikasi')
                    ->limit(30),
                TextColumn::make('kondisi')
                    ->label('Kondisi'),
                TextColumn::make('tanggal_pengadaan')
                    ->label('Tanggal Pengadaan')
                    ->date(),
                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),
            ])
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
