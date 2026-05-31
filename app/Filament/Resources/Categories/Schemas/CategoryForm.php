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
                Section::make(__('app.category_details'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name_ar')
                            ->label(__('app.name_ar'))
                            ->required()
                            ->live(onBlur: true),
                        TextInput::make('name_en')
                            ->label(__('app.name_en'))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label(__('app.slug'))
                            ->required()
                            ->unique(
                                table: 'categories',
                                column: 'slug',
                                ignoreRecord: true,
                                modifyRuleUsing: fn ($rule) => $rule->whereNull('deleted_at')
                            )
                            ->columnSpanFull(),
                        Textarea::make('description_ar')
                            ->label(__('app.description_ar'))
                            ->rows(3),
                        Textarea::make('description_en')
                            ->label(__('app.description_en'))
                            ->rows(3),
                    ]),

                Section::make(__('app.settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_active')
                            ->label(__('app.is_active'))
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label(__('app.order'))
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make(__('app.category_image'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('image')
                            ->image()
                            ->disk('public')
                            ->directory('category')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
