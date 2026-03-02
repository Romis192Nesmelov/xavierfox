<li>
    <a href="{{ route('chapter',['slug' => $item->slug]) }}" class="nav-link{{ $chapter && $chapter->slug == $item->slug ? ' active' : '' }}" aria-current="page">{{ $item->name }}</a>
</li>
