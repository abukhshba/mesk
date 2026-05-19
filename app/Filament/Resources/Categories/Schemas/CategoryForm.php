<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Category Image'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('image')
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->columnSpanFull(),
                    ]),

                Section::make(__('Category Details'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->schema([
                        TextInput::make('name.ar')
                            ->label(__('Name (Arabic)'))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('name.en')
                            ->label(__('Name (English)'))
                            ->required(),
                        TextInput::make('slug')
                            ->label(__('Slug'))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        Textarea::make('description.ar')
                            ->label(__('Description (Arabic)'))
                            ->rows(3),
                        Textarea::make('description.en')
                            ->label(__('Description (English)'))
                            ->rows(3),
                    ]),

                Section::make(__('Settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label(__('Sort Order'))
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
