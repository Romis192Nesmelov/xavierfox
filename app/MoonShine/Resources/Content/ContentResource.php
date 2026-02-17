<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Content;

use App\Models\Content;
use App\MoonShine\Resources\Content\Pages\ContentIndexPage;
use App\MoonShine\Resources\Content\Pages\ContentFormPage;
use App\MoonShine\Resources\Content\Pages\ContentDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Content, ContentIndexPage, ContentFormPage, ContentDetailPage>
 */
class ContentResource extends ModelResource
{
    protected string $model = Content::class;

    protected string $column = 'head';

    protected string $title = 'Контент';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ContentIndexPage::class,
            ContentFormPage::class,
            ContentDetailPage::class,
        ];
    }
}
