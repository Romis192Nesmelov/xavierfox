<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Chapter;

use App\Models\Chapter;
use App\MoonShine\Resources\Chapter\Pages\ChapterDetailPage;
use App\MoonShine\Resources\Chapter\Pages\ChapterFormPage;
use App\MoonShine\Resources\Chapter\Pages\ChapterIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;

/**
 * @extends ModelResource<Chapter, ChapterIndexPage, ChapterFormPage, ChapterDetailPage>
 */
class ChapterResource extends ModelResource
{
    protected string $model = Chapter::class;

    protected string $column = 'name';

    protected string $title = 'Разделы';

    protected string $sortColumn = 'id';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ChapterIndexPage::class,
            ChapterFormPage::class,
            ChapterDetailPage::class,
        ];
    }

    public function search(): array
    {
        return ['name', 'description'];
    }
}
