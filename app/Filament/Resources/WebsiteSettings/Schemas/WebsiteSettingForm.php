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
                Section::make(__('app.brand'))
                    ->icon(Heroicon::OutlinedBuildingOffice)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('company_name_ar')
                            ->label(__('app.company_name_ar'))
                            ->required(),
                        TextInput::make('company_name_en')
                            ->label(__('app.company_name_en'))
                            ->required(),
                        FileUpload::make('logo')
                            ->label(__('app.logo'))
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                        FileUpload::make('favicon')
                            ->label(__('app.favicon'))
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                    ]),

                Section::make(__('app.contact'))
                    ->icon(Heroicon::OutlinedPhone)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('email')
                            ->label(__('app.email'))
                            ->email(),
                        TextInput::make('phone')
                            ->label(__('app.phone'))
                            ->tel(),
                        TextInput::make('whatsapp')
                            ->label(__('app.whatsapp_number')),
                        Textarea::make('address')
                            ->label(__('app.address'))
                            ->rows(2)->columnSpanFull(),
                        TextInput::make('google_maps_link')
                            ->label(__('app.google_maps_link'))
                            ->url()
                            ->columnSpanFull(),
                    ]),

                Section::make(__('app.social_media'))
                    ->icon(Heroicon::OutlinedGlobeAlt)
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('facebook')->label(__('app.facebook_url'))->url(),
                        TextInput::make('instagram')->label(__('app.instagram_url'))->url(),
                        TextInput::make('twitter')->label(__('app.twitter_url'))->url(),
                        TextInput::make('linkedin')->label(__('app.linkedin_url'))->url(),
                    ]),
            ]);
    }
}
