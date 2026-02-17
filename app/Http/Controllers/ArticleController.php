<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Chapter;
use Illuminate\View\View;

class ArticleController extends BaseController
{
    /**
     * Display home page.
     */
    public function __invoke(string $slug, string|null $subSlug): View
    {
        $chapterId = Chapter::query()->where('slug', $slug)->pluck('id')->firstOrFail();
        $article = Article::query()->where('chapter_id',$chapterId)->where('slug', $subSlug)->with()->firstOrFail();
        $article->rating += 1;
        $article->save();

        return view('article', [
            'nav_links' => $this->mainMenu,
            'article' => $article,
            'contacts' => $this->contacts
        ]);
    }
}
