<?php

namespace App\Filament\Resources\Categories\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ChildrenRelationManager extends RelationManager
{
    protected static string $relationship = 'children';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('app.child_categories');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->disk('public')
                    ->columnSpanFull(),
                TextInput::make('name_ar')
                    ->label(__('app.name_ar'))
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('name_en')
                    ->label(__('app.name_en'))
                    ->required(),
                TextInput::make('slug')
                    ->label(__('app.slug'))
                    ->required()
                    ->unique('categories', 'slug', ignoreRecord: true)
                    ->columnSpanFull(),
                Textarea::make('description.ar')
                    ->label(__('app.description_ar'))
                    ->rows(2),
                Textarea::make('description.en')
                    ->label(__('app.description_en'))
                    ->rows(2),
                Toggle::make('is_active')
                    ->label(__('app.is_active'))
                    ->default(true),
                TextInput::make('sort_order')
                    ->label(__('app.order'))
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image')
                    ->label(__('app.image'))
                    ->circular(),
                TextColumn::make('name_ar')
                    ->label(__('app.name_ar'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name_en')
                    ->label(__('app.name_en'))
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_active')
                    ->label(__('app.is_active')),
                TextColumn::make('sort_order')
                    ->label(__('app.order'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }
}
