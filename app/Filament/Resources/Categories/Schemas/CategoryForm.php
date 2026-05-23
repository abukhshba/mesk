<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Category Details'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name_ar')
                            ->label(__('Name (Arabic)'))
                            ->required()
                            ->live(onBlur: true),
                        TextInput::make('name_en')
                            ->label(__('Name (English)'))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label(__('Slug'))
                            ->required()
                            ->unique(
                                table: 'categories',
                                column: 'slug',
                                ignoreRecord: true,
                                modifyRuleUsing: fn ($rule) => $rule->whereNull('deleted_at')
                            )
                            ->columnSpanFull(),
                        Textarea::make('description_ar')
                            ->label(__('Description (Arabic)'))
                            ->rows(3),
                        Textarea::make('description_en')
                            ->label(__('Description (English)'))
                            ->rows(3),
                    ]),

                Section::make(__('Settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label(__('Sort Order'))
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make(__('Category Image'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('image')
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->disk('public')
                            ->directory('category')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
