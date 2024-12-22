<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokResource\Pages;
use App\Models\Stok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Stok';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_sekolah')
                    ->label('Sekolah')
                    ->relationship('sekolah', 'nama_sekolah') // Relasi ke tabel sekolah
                    ->required(),
                Select::make('id_barang')
                    ->label('Barang')
                    ->relationship('barang', 'nama_barang') // Relasi ke tabel barang
                    ->required(),
                TextInput::make('jumlah_stok')
                    ->label('Jumlah Stok')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_stok')
                    ->label('ID Stok') // Ganti dari id ke id_stok
                    ->sortable(),
                TextColumn::make('sekolah.nama_sekolah')
                    ->label('Nama Sekolah')
                    ->searchable(),
                TextColumn::make('barang.nama_barang')
                    ->label('Nama Barang')
                    ->searchable(),
                TextColumn::make('jumlah_stok')
                    ->label('Jumlah Stok')
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
            'index' => Pages\ListStoks::route('/'),
            'create' => Pages\CreateStok::route('/create'),
            'edit' => Pages\EditStok::route('/{record}/edit'),
        ];
    }
}