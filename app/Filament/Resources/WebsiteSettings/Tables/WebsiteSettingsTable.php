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
                    ->label(__('app.company_name_ar'))
                    ->searchable(),
                TextColumn::make('company_name_en')
                    ->label(__('app.company_name_en'))
                    ->searchable(),
                TextColumn::make('logo')
                    ->label(__('app.logo'))
                    ->searchable(),
                TextColumn::make('favicon')
                    ->label(__('app.favicon'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('app.email'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('app.phone'))
                    ->searchable(),
                TextColumn::make('whatsapp')
                    ->label(__('app.whatsapp_number'))
                    ->searchable(),
                TextColumn::make('facebook')
                    ->label(__('app.facebook_url'))
                    ->searchable(),
                TextColumn::make('instagram')
                    ->label(__('app.instagram_url'))
                    ->searchable(),
                TextColumn::make('twitter')
                    ->label(__('app.twitter_url'))
                    ->searchable(),
                TextColumn::make('linkedin')
                    ->label(__('app.linkedin_url'))
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
