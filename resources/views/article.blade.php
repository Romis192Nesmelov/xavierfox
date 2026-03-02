<x-app-layout>
    @include('partials.slots', ['chapter' => $article->chapter])
    <article class="article" aria-labelledby="article-title">
        <header class="article-header">
            <div class="container">
                <div class="article-header-content">
                        <span class="article-category">
                            <a href="{{ route('chapter', ['slug' => $article->chapter->slug]) }}">{{ $article->chapter->name }}</a>
                        </span>
                    <h1 id="article-title" class="article-title">Настройка роутера OpenWRT</h1>
                    <div class="article-preview">
                        <img src="{{ asset('storage/images/articles/'.$article->image) }}" alt="{{ $article->name }}" />
                    </div>
                </div>
            </div>
        </header>

        <!-- Table of Contents -->
        <nav class="article-toc" aria-labelledby="toc-title">
            <div class="container">
                <div class="toc-content">
                    <h2 id="toc-title" class="toc-title">Содержание</h2>
                    <ol class="toc-list"></ol>
                </div>
            </div>
        </nav>

        <!-- Article Content -->
        <div class="article-content">
            <div class="container">
                {!! $article->text !!}
            </div>
        </div>
    </article>
</x-app-layout>
