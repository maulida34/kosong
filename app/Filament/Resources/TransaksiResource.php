<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_sekolah')
                    ->label('Sekolah')
                    ->relationship('sekolah', 'nama_sekolah')
                    ->required(),
                Select::make('id_barang')
                    ->label('Barang')
                    ->relationship('barang', 'nama_barang')
                    ->required(),
                DatePicker::make('tanggal_transaksi')
                    ->label('Tanggal Transaksi')
                    ->required(),
                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),
                Select::make('jenis_transaksi')
                    ->label('Jenis Transaksi')
                    ->options([
                        'Distribusi' => 'Distribusi',
                        'Pengembalian' => 'Pengembalian',
                    ])
                    ->required(),
                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('sekolah.nama_sekolah')
                    ->label('Sekolah')
                    ->searchable(),
                TextColumn::make('barang.nama_barang')
                    ->label('Barang')
                    ->searchable(),
                TextColumn::make('tanggal_transaksi')
                    ->label('Tanggal Transaksi')
                    ->date(),
                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),
                TextColumn::make('jenis_transaksi')
                    ->label('Jenis Transaksi')
                    ->sortable(),
                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(50),
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}