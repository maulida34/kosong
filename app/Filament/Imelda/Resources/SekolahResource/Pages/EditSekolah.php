<?php

namespace App\Filament\Imelda\Resources\SekolahResource\Pages;

use App\Filament\Imelda\Resources\SekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSekolah extends EditRecord
{
    protected static string $resource = SekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
