<?php

namespace App\Filament\Resources\Categories\Tables;

use App\Models\Category;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(Category::query()->whereNull('parent_id'))
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image')
                    ->label(__('app.image'))
                    ->circular()
                    ->defaultImageUrl(fn () => asset('images/placeholder.png')),
                TextColumn::make('name_ar')
                    ->label(__('app.name_ar'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name_en')
                    ->label(__('app.name_en'))
                    ->searchable(),
                TextColumn::make('slug')
                    ->label(__('app.slug'))
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_active')
                    ->label(__('app.is_active')),
                TextColumn::make('sort_order')
                    ->label(__('app.order'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label(__('app.is_active')),
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
