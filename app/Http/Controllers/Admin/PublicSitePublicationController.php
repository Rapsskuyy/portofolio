<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PublicSitePublisher;
use Illuminate\Http\RedirectResponse;

class PublicSitePublicationController extends Controller
{
    public function __invoke(PublicSitePublisher $publisher): RedirectResponse
    {
        return back()->with('success', $publisher->trigger('manual_publish'));
    }
}
