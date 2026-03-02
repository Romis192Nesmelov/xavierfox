<x-app-layout>
    @include('partials.slots', ['chapter' => $chapter])
    <main>
        <!-- Category Header -->
        <section class="category-header" aria-labelledby="category-title">
            <div class="container">
                <div class="category-header-content">
                    <h1 id="category-title" class="category-title">{{ $chapter->name }}</h1>
                    <p class="category-description">{{ $chapter->description }}</p>
                </div>
            </div>
        </section>

        <!-- Articles Grid -->
        <section class="articles-section" aria-labelledby="articles-title">
            <div class="container">
                <h2 id="articles-title" class="section-title visually-hidden">Статьи категории</h2>
                <div class="articles-grid">
                    @foreach($articles as $article)
                        <article class="article-card is-visible" style="opacity: 0; transform: translateY(20px); transition: opacity 0.4s, transform 0.4s;">
                            <a href="{{ route('article', ['slug' => $article->chapter->slug, 'subSlug' => $article->slug]) }}" class="article-card-link">
                                <div class="article-card-preview">
                                    <img src="{{ asset('storage/images/articles/'.$article->image) }}" />
                                </div>
                                <div class="article-card-content">
                                    <h3 class="article-card-title">{{ $article->name }}</h3>
                                    <p class="article-card-excerpt">{{ $article->annotation }}</p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
                {{ $articles->render() }}
            </div>
        </section>
    </main>
</x-app-layout>
