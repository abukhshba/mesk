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
                Section::make(__('app.title'))
                    ->icon(Heroicon::OutlinedLanguage)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title_ar')->label(__('app.title_ar'))->required(),
                        TextInput::make('title_en')->label(__('app.title_en'))->required(),
                    ]),

                Section::make(__('app.description'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('description_ar')->label(__('app.description_ar')),
                        RichEditor::make('description_en')->label(__('app.description_en')),
                    ]),

                Section::make(__('app.mission_vision'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('mission_ar')->label(__('app.mission_ar')),
                        RichEditor::make('mission_en')->label(__('app.mission_en')),
                        RichEditor::make('vision_ar')->label(__('app.vision_ar')),
                        RichEditor::make('vision_en')->label(__('app.vision_en')),
                    ]),

                Section::make(__('app.about_us_image'))
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
