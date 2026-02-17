<a href="{{ route('chapter',['slug' => $item->slug]) }}" class="nav-link">
    <img class="nav-icon" src="{{ asset('storage/images/icons/'.$item->icon) }}"/>
    {{ $item->name }}
</a>
