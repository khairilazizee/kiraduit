<?php

namespace App\Filament\Resources\SpendingItemResource\Pages;

use App\Filament\Resources\SpendingItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpendingItem extends EditRecord
{
    protected static string $resource = SpendingItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
