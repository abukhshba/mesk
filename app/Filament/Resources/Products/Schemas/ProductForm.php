<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use App\Models\SubCategory;
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
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('main_image')
                            ->label(__('Main Image'))
                            ->collection('main_image')
                            ->image()
                            ->imageResizeMode('cover'),
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->label(__('Gallery Images'))
                            ->collection('gallery')
                            ->image()
                            ->multiple()
                            ->reorderable(),
                    ]),

                Section::make(__('Product Info'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->schema([
                        Select::make('category_id')
                            ->label(__('Category'))
                            ->options(Category::active()->get()->pluck('name', 'id')->map(fn ($v) => is_array($v) ? ($v['ar'] ?? '') : $v))
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn (callable $set) => $set('subcategory_id', null)),
                        Select::make('subcategory_id')
                            ->label(__('Subcategory'))
                            ->options(fn (callable $get) => SubCategory::where('category_id', $get('category_id'))->active()->get()->pluck('name', 'id')->map(fn ($v) => is_array($v) ? ($v['ar'] ?? '') : $v))
                            ->nullable(),
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
                        Textarea::make('short_description.ar')->label(__('Short Description (AR)'))->rows(2),
                        Textarea::make('short_description.en')->label(__('Short Description (EN)'))->rows(2),
                    ]),

                Section::make(__('Full Description'))
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->columns(2)
                    ->schema([
                        RichEditor::make('description.ar')->label(__('Description (Arabic)'))->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                        RichEditor::make('description.en')->label(__('Description (English)'))->toolbarButtons(['bold', 'bulletList', 'orderedList', 'redo', 'undo']),
                    ]),

                Section::make(__('Specifications'))
                    ->icon(Heroicon::OutlinedBeaker)
                    ->columns(2)
                    ->schema([
                        TextInput::make('active_ingredient')->label(__('Active Ingredient')),
                        TextInput::make('application_rate')->label(__('Application Rate')),
                        TextInput::make('package_sizes')->label(__('Package Sizes')),
                        Textarea::make('usage_instructions')->label(__('Usage Instructions'))->rows(3),
                        Textarea::make('safety_precautions')->label(__('Safety Precautions'))->rows(3),
                    ]),

                Section::make(__('Settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->columns(3)
                    ->schema([
                        Toggle::make('is_featured')->label(__('Featured'))->default(false),
                        Toggle::make('is_active')->label(__('Active'))->default(true),
                        TextInput::make('sort_order')->label(__('Sort Order'))->numeric()->default(0),
                    ]),
            ]);
    }
}
