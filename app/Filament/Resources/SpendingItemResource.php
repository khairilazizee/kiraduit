<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SpendingItem;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SpendingItemResource\Pages;
use App\Filament\Resources\SpendingItemResource\RelationManagers;

class SpendingItemResource extends Resource
{
    protected static ?string $model = SpendingItem::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('item_name'),
                Forms\Components\TextInput::make('spending_amount'),
                Forms\Components\Textarea::make('remarks'),
                Forms\Components\Hidden::make('user_id')->default(fn() => auth()->id()),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('item_name'),
                Tables\Columns\TextColumn::make('spending_amount')->money("MYR")->summarize(Sum::make()->label('Total')->money("MYR")),
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
            'index' => Pages\ListSpendingItems::route('/'),
            'create' => Pages\CreateSpendingItem::route('/create'),
            'edit' => Pages\EditSpendingItem::route('/{record}/edit'),
        ];
    }
}
