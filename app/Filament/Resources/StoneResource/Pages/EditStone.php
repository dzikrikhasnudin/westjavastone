<?php

namespace App\Filament\Resources\StoneResource\Pages;

use App\Filament\Resources\StoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStone extends EditRecord
{
    protected static string $resource = StoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
