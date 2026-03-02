<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Chapter;
use Illuminate\View\View;

class ChapterController extends BaseController
{
    /**
     * Display home page.
     */
    public function __invoke(string $slug): View
    {
        if ($slug == 'all-articles') {
            $chapter = null;
            $articles = Article::query()->with('chapter')->where('active', 1)->orderBy('chapter_id', 'asc')->paginate(10);
            $articlesCount = Article::query()->count();
        } else {
            $chapter = Chapter::query()->where('slug', $slug)->with('articles')->firstOrFail();
            $articles = $chapter->articles()->with('chapter')->paginate(10);
            $articlesCount = $chapter->articles->count();
        }

        return view('chapter', [
            'nav_links' => $this->mainMenu,
            'chapter' => $chapter,
            'articles' => $articles,
            'articles_count' => $articlesCount,
            'contacts' => $this->contacts,
        ]);
    }
}
