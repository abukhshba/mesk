<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\WebsiteSetting;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(private readonly ContactService $contactService) {}

    public function index()
    {
        $settings = WebsiteSetting::getSettings();

        return view('contact', compact('settings'));
    }

    public function store(ContactFormRequest $request)
    {
        $this->contactService->store($request->validated());

        return back()->with('success', __('messages.contact_success'));
    }
}
