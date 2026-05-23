<?php

namespace App\Filament\Resources\AboutUs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class AboutUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Title'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title_ar')->label(__('Title (Arabic)'))->required(),
                        TextInput::make('title_en')->label(__('Title (English)'))->required(),
                    ]),

                Section::make(__('Description'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('description_ar')->label(__('Description (Arabic)')),
                        RichEditor::make('description_en')->label(__('Description (English)')),
                    ]),

                Section::make(__('Mission & Vision'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('mission_ar')->label(__('Mission (Arabic)')),
                        RichEditor::make('mission_en')->label(__('Mission (English)')),
                        RichEditor::make('vision_ar')->label(__('Vision (Arabic)')),
                        RichEditor::make('vision_en')->label(__('Vision (English)')),
                    ]),

                Section::make(__('About Us Image'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->columnSpanFull()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('image')
                            ->image()
                            ->directory('about')
                            ->disk('public')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
