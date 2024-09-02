<?php

namespace App\Filament\Resources\SpendingResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SpendingDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'SpendingDetails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('item_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('spending_date')
                    ->required(),
                Forms\Components\TextInput::make('spending_amount')
                    ->required(),
                Forms\Components\Textarea::make('remarks')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('item_name')
            ->columns([
                Tables\Columns\TextColumn::make('item_name'),
                Tables\Columns\TextColumn::make('spending_date')
                    ->date("d/m/Y"),
                Tables\Columns\TextColumn::make('spending_amount')
                    ->money("MYR")
                    ->summarize(Sum::make()->label('Total')->money("MYR"))
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
