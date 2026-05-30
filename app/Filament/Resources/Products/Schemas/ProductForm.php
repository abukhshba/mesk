<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Product Images'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('main_image')
                            ->label(__('Main Image'))
                            ->collection('main_image')
                            ->image()
                            ->imageResizeMode('cover')
                            ->disk('public')
                            ->visibility('public'),
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->label(__('Gallery Images'))
                            ->collection('gallery')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->disk('public')
                            ->visibility('public'),
                    ]),

                Section::make(__('Product Info'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name_ar')
                            ->label(__('Name (Arabic)'))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('name_en')
                            ->label(__('Name (English)'))
                            ->required(),
                        TextInput::make('slug')
                            ->label(__('Slug'))
                            ->required()
                            ->unique(
                                table: 'products',
                                column: 'slug',
                                ignoreRecord: true,
                                modifyRuleUsing: fn ($rule) => $rule->whereNull('deleted_at')
                            )
                            ->columnSpanFull(),
                        Select::make('category_id')
                            ->label(__('Category'))
                            ->options(function () {
                                $locale = app()->getLocale();
                                $options = [];
                                $parents = Category::parents()->active()->with('children')->get();
                                foreach ($parents as $parent) {
                                    $parentName = $parent->getTranslation('name', $locale);
                                    if ($parent->children->isEmpty()) {
                                        $options[$parent->id] = $parentName;
                                    } else {
                                        $options[$parent->id] = $parentName;
                                        foreach ($parent->children as $child) {
                                            $options[$child->id] = '— '.$child->getTranslation('name', $locale);
                                        }
                                    }
                                }

                                return $options;
                            })
                            ->required()
                            ->searchable(),
                        Textarea::make('short_description_ar')
                            ->label(__('Short Description (AR)'))->rows(2),
                        Textarea::make('short_description_en')
                            ->label(__('Short Description (EN)'))->rows(2),
                    ]),

                Section::make(__('Full Description'))
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('description_ar')->label(__('Description (Arabic)'))->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                        RichEditor::make('description_en')->label(__('Description (English)'))->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                    ]),

                Section::make(__('Properties & Benefits'))
                    ->icon(Heroicon::OutlinedSparkles)
                    ->description(__('The properties, features, and benefits of this product'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('properties_ar')
                            ->label(__('Properties & Benefits (Arabic)'))
                            ->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                        RichEditor::make('properties_en')
                            ->label(__('Properties & Benefits (English)'))
                            ->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                    ]),

                Section::make(__('Directions & Application Rates'))
                    ->icon(Heroicon::OutlinedTableCells)
                    ->description(__('Define how this product should be applied. Choose text for simple directions, or table for crop-specific rates.'))
                    ->columnSpanFull()
                    ->schema([
                        Select::make('application_rates_type')
                            ->label(__('Display Format'))
                            ->options([
                                'text' => __('Simple Text Description'),
                                'table' => __('Structured Table (Crops × Rates)'),
                            ])
                            ->default('text')
                            ->required()
                            ->live()
                            ->columnSpanFull(),

                        // --- TEXT MODE ---
                        Textarea::make('application_rates_text_ar')
                            ->label(__('Directions Text (Arabic)'))
                            ->rows(4)
                            ->visible(fn ($get) => $get('application_rates_type') === 'text'),
                        Textarea::make('application_rates_text_en')
                            ->label(__('Directions Text (English)'))
                            ->rows(4)
                            ->visible(fn ($get) => $get('application_rates_type') === 'text'),

                        // --- TABLE MODE ---
                        Toggle::make('application_rates_has_notes')
                            ->label(__('Include Notes Column'))
                            ->helperText(__('Enable to add a notes/remarks column to the application rates table'))
                            ->visible(fn ($get) => $get('application_rates_type') === 'table')
                            ->live()
                            ->columnSpanFull(),

                        Repeater::make('application_rates_rows')
                            ->label(__('Application Rates Table'))
                            ->schema([
                                TextInput::make('crop_ar')
                                    ->label(__('Crop (Arabic)'))
                                    ->required(),
                                TextInput::make('crop_en')
                                    ->label(__('Crop (English)'))
                                    ->required(),
                                TextInput::make('rate_ar')
                                    ->label(__('Rate (Arabic)'))
                                    ->required(),
                                TextInput::make('rate_en')
                                    ->label(__('Rate (English)'))
                                    ->required(),
                                TextInput::make('notes_ar')
                                    ->label(__('Notes (Arabic)'))
                                    ->visible(fn ($get) => $get('../../application_rates_has_notes')),
                                TextInput::make('notes_en')
                                    ->label(__('Notes (English)'))
                                    ->visible(fn ($get) => $get('../../application_rates_has_notes')),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->addActionLabel(__('Add Crop Row'))
                            ->reorderable()
                            ->collapsible()
                            ->visible(fn ($get) => $get('application_rates_type') === 'table')
                            ->columnSpanFull(),

                        Textarea::make('application_rates_footer_ar')
                            ->label(__('Footer Note (Arabic)'))
                            ->helperText(__('e.g. For foliar spray: 2–3 kg / 1000 liters of water / hectare'))
                            ->rows(2)
                            ->visible(fn ($get) => $get('application_rates_type') === 'table'),
                        Textarea::make('application_rates_footer_en')
                            ->label(__('Footer Note (English)'))
                            ->rows(2)
                            ->visible(fn ($get) => $get('application_rates_type') === 'table'),
                    ])
                    ->columns(2),

                Section::make(__('Specifications'))
                    ->icon(Heroicon::OutlinedBeaker)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('active_ingredient')->label(__('Active Ingredient')),
                        TextInput::make('application_rate')->label(__('Application Rate (Legacy)')),
                        TextInput::make('package_sizes_ar')->label(__('Package Sizes (Arabic)'))->placeholder('1 كجم, 10 كجم, 25 كجم'),
                        TextInput::make('package_sizes_en')->label(__('Package Sizes (English)'))->placeholder('1 kg, 10 kg, 25 kg'),
                        Textarea::make('usage_instructions')->label(__('Usage Instructions'))->rows(3),
                        Textarea::make('safety_precautions')->label(__('Safety Precautions'))->rows(3),
                    ]),

                Section::make(__('Settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_featured')->label(__('Featured'))->default(false),
                        Toggle::make('is_active')->label(__('Active'))->default(true),
                        TextInput::make('sort_order')->label(__('Sort Order'))->numeric()->default(0),
                    ]),
            ]);
    }
}
