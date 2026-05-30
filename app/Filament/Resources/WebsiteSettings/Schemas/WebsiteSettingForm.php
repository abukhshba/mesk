<?php

namespace App\Filament\Resources\WebsiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class WebsiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Brand'))
                    ->icon(Heroicon::OutlinedBuildingOffice)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('company_name_ar')
                            ->label(__('Company Name (Arabic)'))
                            ->required(),
                        TextInput::make('company_name_en')
                            ->label(__('Company Name (English)'))
                            ->required(),
                        FileUpload::make('logo')
                            ->label(__('Logo'))
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                        FileUpload::make('favicon')
                            ->label(__('Favicon'))
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                    ]),

                Section::make(__('Contact'))
                    ->icon(Heroicon::OutlinedPhone)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('email')
                            ->label(__('Email'))
                            ->email(),
                        TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel(),
                        TextInput::make('whatsapp')
                            ->label(__('WhatsApp Number')),
                        Textarea::make('address')
                            ->label(__('Address'))
                            ->rows(2)->columnSpanFull(),
                    ]),

                Section::make(__('Social Media'))
                    ->icon(Heroicon::OutlinedGlobeAlt)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('facebook')->label(__('Facebook URL'))->url(),
                        TextInput::make('instagram')->label(__('Instagram URL'))->url(),
                        TextInput::make('twitter')->label(__('Twitter / X URL'))->url(),
                        TextInput::make('linkedin')->label(__('LinkedIn URL'))->url(),
                    ]),
            ]);
    }
}
