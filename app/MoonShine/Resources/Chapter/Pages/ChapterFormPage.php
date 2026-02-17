<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Chapter\Pages;

use App\MoonShine\Resources\Article\ArticleResource;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Chapter\ChapterResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Divider;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\Checkbox;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use Throwable;


/**
 * @extends FormPage<ChapterResource>
 */
class ChapterFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Grid::make([
                    Column::make([
                        Image::make('Иконка','icon')->disk('public')->dir('images/icons'),
                        Checkbox::make('Раздел активен', 'active')->nullable()->default(1)
                    ])->columnSpan(2),
                    Column::make([
                        Grid::make([
                            Column::make([
                                Text::make('Название','name')->required(),
                            ])->columnSpan(6),
                            Column::make([
                                Text::make('URI','slug')->required(),
                            ])->columnSpan(6),
                        ]),
                        Text::make('Описание','description')->required(),
                        Divider::make(),
                        HasMany::make(
                            'Статьи',
                            'articles',
                            resource: ArticleResource::class
                        )
                    ])->columnSpan(10),
                ])
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'image'       => ['required_without:id','mimes:svg','max:200'],
            'name'        => ['required','min:3','max:191'],
            'slug'        => ['nullable','min:3','max:191'],
            'description' => ['required','min:3','max:191'],
            'active'      => ['nullable','max:1'],
        ];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
