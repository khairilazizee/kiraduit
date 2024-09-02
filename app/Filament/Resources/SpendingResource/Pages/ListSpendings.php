<?php

namespace App\Filament\Resources\SpendingResource\Pages;

use App\Filament\Resources\SpendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpendings extends ListRecords
{
    protected static string $resource = SpendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
