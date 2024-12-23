<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilResource\Pages;
use App\Models\Profil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfilResource extends Resource
{
    protected static ?string $model = Profil::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->maxLength(20),
                Forms\Components\DatePicker::make('tgl_lahir')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->tel()
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('github')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nim')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('github')
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->wrap(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfils::route('/'),
            'create' => Pages\CreateProfil::route('/create'),
            'edit' => Pages\EditProfil::route('/{record}/edit'),
        ];
    }
}