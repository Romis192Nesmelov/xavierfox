<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class BaseController extends Controller
{
    protected Collection $mainMenu;
    protected Collection $contacts;

    public function __construct()
    {
        $this->mainMenu = Chapter::query()->where('active', 1)->withCount('articles')->get();
        $this->contacts = Contact::query()->where('active', 1)->get();
    }
}
