<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\Article\ArticleResource;
use App\MoonShine\Resources\Chapter\ChapterResource;
use App\MoonShine\Resources\Contacts\ContactsResource;
use App\MoonShine\Resources\Content\ContentResource;
use MoonShine\ColorManager\ColorManager;
use MoonShine\ColorManager\Palettes\GrayPalette;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\Image\ImageResource;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = GrayPalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuGroup::make(static fn () => 'Разделы и статьи', [
                MenuItem::make(ChapterResource::class, 'Разделы'),
                MenuItem::make(ArticleResource::class, 'Статьи'),
                MenuItem::make(ImageResource::class, 'Галерея'),
            ]),
            MenuItem::make(ContentResource::class, 'Контент'),
            MenuItem::make(ContactsResource::class, 'Контакты'),
            MenuItem::make(ImageResource::class, 'Images'),
        ];
    }

    /**
     * @param  ColorManager  $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    protected function getFooterMenu(): array
    {
        return [];
    }

    protected function getFooterCopyright(): string
    {
        return '';
    }
}
