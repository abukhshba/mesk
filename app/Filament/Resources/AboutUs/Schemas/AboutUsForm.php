<?php

namespace App\Filament\Resources\AboutUs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class AboutUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('About Us Image'))
                    ->icon(Heroicon::OutlinedPhoto)
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('image')
                            ->image()
                            ->columnSpanFull(),
                    ]),

                Section::make(__('Title'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->schema([
                        TextInput::make('title.ar')->label(__('Title (Arabic)'))->required(),
                        TextInput::make('title.en')->label(__('Title (English)'))->required(),
                    ]),

                Section::make(__('Description'))
                    ->columns(2)
                    ->schema([
                        RichEditor::make('description.ar')->label(__('Description (Arabic)')),
                        RichEditor::make('description.en')->label(__('Description (English)')),
                    ]),

                Section::make(__('Mission & Vision'))
                    ->columns(2)
                    ->schema([
                        RichEditor::make('mission.ar')->label(__('Mission (Arabic)')),
                        RichEditor::make('mission.en')->label(__('Mission (English)')),
                        RichEditor::make('vision.ar')->label(__('Vision (Arabic)')),
                        RichEditor::make('vision.en')->label(__('Vision (English)')),
                    ]),
            ]);
    }
}
