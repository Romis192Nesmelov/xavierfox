<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Content\Pages;

use App\MoonShine\Resources\Content\ContentResource;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Divider;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use Throwable;

/**
 * @extends FormPage<ContentResource>
 */
class ContentFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        if ($this->getItem()->id == 1) {
            return [
                Box::make([
                    ID::make(),
                    Grid::make([
                        Column::make([
                            Text::make('Заголовок', 'head')->required(),
                            Divider::make(),
                            Textarea::make('Текст', 'text')->required()->customAttributes(['rows' => 9]),
                        ]),
                    ]),
                ]),
            ];
        } else {
            return [
                Box::make([
                    ID::make(),
                    Grid::make([
                        Column::make([
                            Image::make('Картинка', 'image')->disk('public')->dir('images/content'),
                        ])->columnSpan(2),
                        Column::make([
                            Text::make('Заголовок', 'head')->required(),
                            Text::make('Подзаголовок', 'sub_head')->required(),
                            Divider::make(),
                            Textarea::make('Текст', 'text')->required()->customAttributes(['rows' => 9]),
                        ])->columnSpan(10),
                    ]),
                ]),
            ];
        }
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
        if ($this->getItem()->id == 1) {
            return [
                'head' => ['required', 'min:3', 'max:191'],
                'text' => ['required', 'min:5', 'max:1500'],
            ];
        } else {
            return [
                'image' => ['required_without:id', 'mimes:svg,jpg,png', 'max:2000'],
                'head' => ['required', 'min:3', 'max:191'],
                'sub_head' => ['required', 'min:3', 'max:191'],
                'text' => ['required', 'min:5', 'max:1500'],
            ];
        }
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
