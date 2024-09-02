<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpendingResource\Pages;
use App\Filament\Resources\SpendingResource\RelationManagers;
use App\Filament\Resources\SpendingResource\RelationManagers\SpendingDetailsRelationManager;
use App\Models\Spending;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpendingResource extends Resource
{
    protected static ?string $model = Spending::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->minLength(2),
                Forms\Components\Grid::make()->schema([
                    Forms\Components\DatePicker::make('start_date'),
                    Forms\Components\DatePicker::make('end_date'),
                ])->columns(2),
                Forms\Components\TextInput::make('start_money')->required(),
                Forms\Components\Hidden::make('user_id')->default(fn() => auth()->id())
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('start_date')->date("d/m/Y"),
                Tables\Columns\TextColumn::make('end_date')->date("d/m/Y"),
                Tables\Columns\TextColumn::make('start_money')->money("MYR"),
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
            SpendingDetailsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpendings::route('/'),
            'create' => Pages\CreateSpending::route('/create'),
            'edit' => Pages\EditSpending::route('/{record}/edit'),
        ];
    }
}
