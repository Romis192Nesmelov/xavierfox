<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Content;
use Illuminate\View\View;

class HomeController extends BaseController
{
    /**
     * Display home page.
     */
    public function __invoke(): View
    {
        return view('home', [
            'nav_links' => $this->mainMenu,
            'content' => Content::all(),
            'contacts' => $this->contacts,
        ]);
    }
}
