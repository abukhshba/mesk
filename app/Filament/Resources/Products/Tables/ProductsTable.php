<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('main_image')
                    ->collection('main_image')
                    ->label(__('Image'))
                    ->circular(),
                TextColumn::make('name.ar')
                    ->label(__('Name (AR)'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name.en')
                    ->label(__('Name (EN)'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('category.name')
                    ->label(__('Category'))
                    ->formatStateUsing(fn ($state) => is_array($state) ? ($state['ar'] ?? '') : $state)
                    ->sortable(),
                TextColumn::make('active_ingredient')
                    ->label(__('Active Ingredient'))
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('is_featured')
                    ->label(__('Featured'))
                    ->boolean(),
                ToggleColumn::make('is_active')->label(__('Active')),
                TextColumn::make('sort_order')->label(__('Sort Order'))->numeric()->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label(__('Active')),
                TernaryFilter::make('is_featured')->label(__('Featured')),
                SelectFilter::make('category_id')
                    ->label(__('Category'))
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', 'ar')),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                RestoreAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }
}
