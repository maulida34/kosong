<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SekolahResource\Pages;
use App\Models\Sekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class SekolahResource extends Resource
{
    protected static ?string $model = Sekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_sekolah')
                    ->label('Nama Sekolah')
                    ->required()
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required(),
                TextInput::make('telepon')
                    ->label('Telepon')
                    ->required()
                    ->maxLength(20),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('nama_sekolah')
                    ->label('Nama Sekolah')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('telepon')
                    ->label('Telepon')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
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
            'index' => Pages\ListSekolahs::route('/'),
            'create' => Pages\CreateSekolah::route('/create'),
            'edit' => Pages\EditSekolah::route('/{record}/edit'),
        ];
    }
}