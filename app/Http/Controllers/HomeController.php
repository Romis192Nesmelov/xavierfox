<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Contact;
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
            'popular_articles' => Article::query()->with('chapter')->orderBy('rating', 'desc')->limit(3)->get(),
            'articles_count' => Article::query()->count(),
            'about' => Content::query()->find(1),
            'contacts' => $this->contacts
        ]);
    }
}
