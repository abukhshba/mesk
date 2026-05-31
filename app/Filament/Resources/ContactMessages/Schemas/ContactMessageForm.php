<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('app.name'))
                    ->required(),
                TextInput::make('phone')
                    ->label(__('app.phone'))
                    ->tel(),
                TextInput::make('email')
                    ->label(__('app.email_address'))
                    ->email(),
                TextInput::make('subject')
                    ->label(__('app.subject')),
                Textarea::make('message')
                    ->label(__('app.message'))
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->label(__('app.is_read'))
                    ->required(),
            ]);
    }
}
