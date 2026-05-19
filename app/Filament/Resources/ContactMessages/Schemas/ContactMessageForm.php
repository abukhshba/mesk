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
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('phone')
                    ->label(__('Phone'))
                    ->tel(),
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email(),
                TextInput::make('subject')
                    ->label(__('Subject')),
                Textarea::make('message')
                    ->label(__('Message'))
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->label(__('Read'))
                    ->required(),
            ]);
    }
}
