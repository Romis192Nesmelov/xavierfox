<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Contacts;

use App\Models\Contact;
use App\MoonShine\Resources\Contacts\Pages\ContactsDetailPage;
use App\MoonShine\Resources\Contacts\Pages\ContactsFormPage;
use App\MoonShine\Resources\Contacts\Pages\ContactsIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;

/**
 * @extends ModelResource<Contacts, ContactsIndexPage, ContactsFormPage, ContactsDetailPage>
 */
class ContactsResource extends ModelResource
{
    protected string $model = Contact::class;

    protected string $column = 'address';

    protected string $title = 'Контакты';

    protected string $sortColumn = 'id';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ContactsIndexPage::class,
            ContactsFormPage::class,
            ContactsDetailPage::class,
        ];
    }
}
