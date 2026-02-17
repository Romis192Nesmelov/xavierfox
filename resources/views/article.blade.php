<x-app-layout>
    <x-slot name="vite_files">
        @vite([
            'resources/js/jquery-3.4.1.min.js',
            'resources/js/jquery.easing.1.3.js',
            'resources/js/fancybox.min.js',
            'resources/js/article.js',
            'resources/css/style.css',
            'resources/css/category.css'
        ])
    </x-slot>
    @include('partials.slots')
    <main>
        <!-- Category Header -->
        <section class="category-header">
            <div class="container">
                <!-- Breadcrumbs -->
                <nav class="breadcrumbs" aria-label="Хлебные крошки">
                    <ol>
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li aria-current="page">{{ $chapter->name }}</li>
                    </ol>
                </nav>

                <div class="category-info">
                    <div class="category-icon-large">
                        <img width="50%" src="{{ asset('storage/images/icons/'.$chapter->icon) }}" />
                    </div>
                    <div class="category-text">
                        <h1 class="category-title">{{ $chapter->name }}</h1>
                        <p class="category-description">{{ $chapter->description }}</p>
                        <div class="category-stats">
                            <span class="stat"><strong>{{ $articles_count }}</strong> {{ articlesDeclension($articles_count) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles List -->
        <section class="articles-list">
            <div class="container">
                <h2 class="section-title">Все статьи раздела</h2>

                <div class="articles-grid">

                    @foreach($articles as $article)
                        <article class="article-item">
                            <div class="article-image">
                                <img src="{{ asset('storage/images/articles/'.$article->image) }}" alt="{{ $article->name }}" loading="lazy">
                            </div>
                            <div class="article-body">
{{--                                <div class="article-tags">--}}
{{--                                    <span class="tag-small">Настройка</span>--}}
{{--                                    <span class="tag-small">Wi-Fi 6</span>--}}
{{--                                </div>--}}
                                <h3 class="article-title">{{ $article->name }}</h3>
                                <p class="article-excerpt">{{ $article->annotation }}</p>
                                <div class="article-footer">
                                    <div class="article-meta">
                                        <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> {{ $article->rating }}</span>
                                    </div>
                                    <a href="{{ route('article',['slug' => $chapter->slug, 'subSlug' => $article->slug]) }}" class="btn-primary">Читать статью</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{ $articles->render() }}
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
