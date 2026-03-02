<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Article\Pages;

use App\MoonShine\Resources\Article\ArticleResource;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Support\ListOf;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Divider;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\Checkbox;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;
use Throwable;

/**
 * @extends FormPage<ArticleResource>
 */
class ArticleFormPage extends FormPage
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
                        Image::make('Картинка', 'image')->disk('public')->dir('images/articles'),
                        BelongsTo::make('Раздел', 'chapter', fn ($item) => $item->name),
                        Checkbox::make('Статья активна', 'active')
                            ->nullable()
                            ->default(1),
                    ])->columnSpan(2),
                    Column::make([
                        Grid::make([
                            Column::make([
                                Text::make('Название', 'name')->required(),
                            ])->columnSpan(6),
                            Column::make([
                                Text::make('URI', 'slug')->required(),
                            ])->columnSpan(6),
                        ]),
                        Text::make('Аннотация', 'annotation')->required(),
                        Divider::make(),
                        TinyMce::make('Текст', 'text')->required()->customAttributes(['rows' => 10]),
                    ])->columnSpan(10),
                ]),
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
            'image' => ['required_without:id', 'mimes:jpg,png,svg', 'max:2000'],
            'name' => ['required', 'min:3', 'max:191'],
            'slug' => ['nullable', 'min:3', 'max:191'],
            'annotation' => ['required', 'min:3', 'max:500'],
            'text' => ['required', 'min:5', 'max:66000'],
            'active' => ['nullable', 'max:1'],
            'chapter_id' => ['required', 'integer', 'exists:chapters,id'],
        ];
    }

    /**
     * @param  FormBuilder  $component
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     *
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer(),
        ];
    }

    /**
     * @return list<ComponentContract>
     *
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer(),
        ];
    }

    /**
     * @return list<ComponentContract>
     *
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer(),
        ];
    }
}
