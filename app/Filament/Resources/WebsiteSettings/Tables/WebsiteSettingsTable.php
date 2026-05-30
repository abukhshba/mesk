<?php

namespace App\Filament\Resources\WebsiteSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WebsiteSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name_ar')
                    ->label(__('Company Name (Arabic)'))
                    ->searchable(),
                TextColumn::make('company_name_en')
                    ->label(__('Company Name (English)'))
                    ->searchable(),
                TextColumn::make('logo')
                    ->label(__('Logo'))
                    ->searchable(),
                TextColumn::make('favicon')
                    ->label(__('Favicon'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),
                TextColumn::make('whatsapp')
                    ->label(__('WhatsApp Number'))
                    ->searchable(),
                TextColumn::make('facebook')
                    ->label(__('Facebook URL'))
                    ->searchable(),
                TextColumn::make('instagram')
                    ->label(__('Instagram URL'))
                    ->searchable(),
                TextColumn::make('twitter')
                    ->label(__('Twitter / X URL'))
                    ->searchable(),
                TextColumn::make('linkedin')
                    ->label(__('LinkedIn URL'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
