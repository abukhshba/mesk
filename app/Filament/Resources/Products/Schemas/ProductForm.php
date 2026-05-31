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
                Section::make(__('app.product_images'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('main_image')
                            ->label(__('app.main_image'))
                            ->collection('main_image')
                            ->image()
                            ->imageResizeMode('cover')
                            ->disk('public')
                            ->visibility('public'),
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->label(__('app.gallery_images'))
                            ->collection('gallery')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->disk('public')
                            ->visibility('public'),
                    ]),

                Section::make(__('app.product_info'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
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
                            ->unique(
                                table: 'products',
                                column: 'slug',
                                ignoreRecord: true,
                                modifyRuleUsing: fn ($rule) => $rule->whereNull('deleted_at')
                            )
                            ->columnSpanFull(),
                        Select::make('category_id')
                            ->label(__('app.category'))
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
                            ->label(__('app.short_description_ar'))->rows(2),
                        Textarea::make('short_description_en')
                            ->label(__('app.short_description_en'))->rows(2),
                    ]),

                Section::make(__('app.full_description'))
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('description_ar')->label(__('app.description_ar'))->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                        RichEditor::make('description_en')->label(__('app.description_en'))->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                    ]),

                Section::make(__('app.properties_benefits'))
                    ->icon(Heroicon::OutlinedSparkles)
                    ->description(__('app.properties_benefits_hint'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('properties_ar')
                            ->label(__('app.properties_benefits_ar'))
                            ->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                        RichEditor::make('properties_en')
                            ->label(__('app.properties_benefits_en'))
                            ->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                    ]),

                Section::make(__('app.directions_application_rates'))
                    ->icon(Heroicon::OutlinedTableCells)
                    ->description(__('app.directions_hint'))
                    ->columnSpanFull()
                    ->schema([
                        Select::make('application_rates_type')
                            ->label(__('app.display_format'))
                            ->options([
                                'text' => __('app.simple_text'),
                                'table' => __('app.structured_table'),
                            ])
                            ->default('text')
                            ->required()
                            ->live()
                            ->columnSpanFull(),

                        // --- TEXT MODE ---
                        Textarea::make('application_rates_text_ar')
                            ->label(__('app.directions_text_ar'))
                            ->rows(4)
                            ->visible(fn ($get) => $get('application_rates_type') === 'text'),
                        Textarea::make('application_rates_text_en')
                            ->label(__('app.directions_text_en'))
                            ->rows(4)
                            ->visible(fn ($get) => $get('application_rates_type') === 'text'),

                        // --- TABLE MODE ---
                        Toggle::make('application_rates_has_notes')
                            ->label(__('app.include_notes'))
                            ->helperText(__('app.include_notes_hint'))
                            ->visible(fn ($get) => $get('application_rates_type') === 'table')
                            ->live()
                            ->columnSpanFull(),

                        Repeater::make('application_rates_rows')
                            ->label(__('app.application_rates_table'))
                            ->schema([
                                TextInput::make('crop_ar')
                                    ->label(__('app.crop_ar'))
                                    ->required(),
                                TextInput::make('crop_en')
                                    ->label(__('app.crop_en'))
                                    ->required(),
                                TextInput::make('rate_ar')
                                    ->label(__('app.rate_ar'))
                                    ->required(),
                                TextInput::make('rate_en')
                                    ->label(__('app.rate_en'))
                                    ->required(),
                                TextInput::make('notes_ar')
                                    ->label(__('app.notes_ar'))
                                    ->visible(fn ($get) => $get('../../application_rates_has_notes')),
                                TextInput::make('notes_en')
                                    ->label(__('app.notes_en'))
                                    ->visible(fn ($get) => $get('../../application_rates_has_notes')),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->addActionLabel(__('app.add_crop_row'))
                            ->reorderable()
                            ->collapsible()
                            ->visible(fn ($get) => $get('application_rates_type') === 'table')
                            ->columnSpanFull(),

                        Textarea::make('application_rates_footer_ar')
                            ->label(__('app.footer_note_ar'))
                            ->helperText(__('app.footer_note_hint'))
                            ->rows(2)
                            ->visible(fn ($get) => $get('application_rates_type') === 'table'),
                        Textarea::make('application_rates_footer_en')
                            ->label(__('app.footer_note_en'))
                            ->rows(2)
                            ->visible(fn ($get) => $get('application_rates_type') === 'table'),
                    ])
                    ->columns(2),

                Section::make(__('app.specifications'))
                    ->icon(Heroicon::OutlinedBeaker)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('active_ingredient')->label(__('app.active_ingredient')),
                        TextInput::make('application_rate')->label(__('app.application_rate_legacy')),
                        TextInput::make('package_sizes_ar')->label(__('app.package_sizes_ar'))->placeholder('1 كجم, 10 كجم, 25 كجم'),
                        TextInput::make('package_sizes_en')->label(__('app.package_sizes_en'))->placeholder('1 kg, 10 kg, 25 kg'),
                        Textarea::make('usage_instructions')->label(__('app.usage_instructions'))->rows(3),
                        Textarea::make('safety_precautions')->label(__('app.safety_precautions'))->rows(3),
                    ]),

                Section::make(__('app.settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_featured')->label(__('app.is_featured'))->default(false),
                        Toggle::make('is_active')->label(__('app.is_active'))->default(true),
                        TextInput::make('sort_order')->label(__('app.order'))->numeric()->default(0),
                    ]),
            ]);
    }
}
