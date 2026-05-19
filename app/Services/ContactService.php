<?php

namespace App\Services;

class ContactService
{
    public function store(array $data): \App\Models\ContactMessage
    {
        return \App\Models\ContactMessage::create($data);
    }
}
