<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\WebsiteSetting;

class AboutController extends Controller
{
    public function __invoke()
    {
        $about = AboutUs::first();
        $settings = WebsiteSetting::getSettings();

        return view('about', compact('about', 'settings'));
    }
}
