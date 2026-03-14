<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Article;
use App\Models\Chapter;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Image;
use App\MoonShine\Resources\Article\ArticleResource;
use App\MoonShine\Resources\Chapter\ChapterResource;
use App\MoonShine\Resources\Contacts\ContactsResource;
use App\MoonShine\Resources\Content\ContentResource;
use App\MoonShine\Resources\Image\ImageResource;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Link;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;

#[\MoonShine\MenuManager\Attributes\SkipMenu]

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: __('Home page');
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        return [
            Grid::make([
                Column::make([
                    ValueMetric::make(fn () => (string) Link::make(app(ChapterResource::class)->getIndexPageUrl(), 'Разделы'))
                        ->value(fn () => Chapter::count())
                        ->icon('folder-arrow-down'),
                ])->columnSpan(2),
                Column::make([
                    ValueMetric::make(fn () => (string) Link::make(app(ArticleResource::class)->getIndexPageUrl(), 'Статьи'))
                        ->value(fn () => Article::count())
                        ->icon('paper-clip'),
                ])->columnSpan(2),
                Column::make([
                    ValueMetric::make(fn () => (string) Link::make(app(ContentResource::class)->getIndexPageUrl(), 'Контент'))
                        ->value(fn () => Content::count())
                        ->icon('newspaper'),
                ])->columnSpan(2),
                Column::make([
                    ValueMetric::make(fn () => (string) Link::make(app(ContactsResource::class)->getIndexPageUrl(), 'Контакты'))
                        ->value(fn () => Contact::count())
                        ->icon('chat-bubble-left-right'),
                ])->columnSpan(2),
                Column::make([
                    ValueMetric::make(fn () => (string) Link::make(app(ImageResource::class)->getIndexPageUrl(), 'Галерея'))
                        ->value(fn () => Image::count())
                        ->icon('photo'),
                ])->columnSpan(2),
            ]),
        ];
    }
}
