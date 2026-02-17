<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Contacts;

use App\Models\Contact;
use App\MoonShine\Resources\Contacts\Pages\ContactsIndexPage;
use App\MoonShine\Resources\Contacts\Pages\ContactsFormPage;
use App\MoonShine\Resources\Contacts\Pages\ContactsDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Contacts, ContactsIndexPage, ContactsFormPage, ContactsDetailPage>
 */
class ContactsResource extends ModelResource
{
    protected string $model = Contact::class;

    protected string $column = 'address';

    protected string $title = 'Контакты';

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
