<?php

namespace App\Filament\Resources\SpendingDetailResource\Pages;

use App\Filament\Resources\SpendingDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpendingDetails extends ListRecords
{
    protected static string $resource = SpendingDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
