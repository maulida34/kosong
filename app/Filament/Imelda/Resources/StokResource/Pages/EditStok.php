<?php

namespace App\Filament\Imelda\Resources\StokResource\Pages;

use App\Filament\Imelda\Resources\StokResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStok extends EditRecord
{
    protected static string $resource = StokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
