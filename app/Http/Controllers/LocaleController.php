<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke(Request $request, string $locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
            session(['locale' => $locale]);
        }

        // Ajax/fetch calls (from admin panel switcher) — just confirm
        if ($request->expectsJson() || $request->header('X-Locale-Switch')) {
            return response()->noContent();
        }

        return redirect()->back(302, [], '/');
    }
}
