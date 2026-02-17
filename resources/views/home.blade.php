<x-app-layout>
    <x-slot name="vite_files">
        @vite(['resources/css/style.css'])
    </x-slot>
    @include('partials.slots')
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <span class="hero-tag">IT & Technology Hub</span>
                <h1 class="hero-title">
                    <span class="text-white">XAVIER</span>
                    <span class="text-red"> FOX</span>
                </h1>
                <p class="hero-subtitle">COMMUNICATIONS</p>
                <div class="hero-divider">
                    <span></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    <span></span>
                </div>
                <p class="hero-description">Профессиональные статьи и руководства по сетевым технологиям, операционным системам и программному обеспечению</p>
            </div>
            <div class="scroll-indicator">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
            </div>
        </section>
        <!-- Categories Section -->
        <section class="categories" id="categories">
            <div class="container">
                <h2 class="section-title">Разделы</h2>
                <p class="section-subtitle">Выберите интересующую вас тематику и погрузитесь в мир технологий</p>

                <div class="categories-grid">
                    @foreach($nav_links as $item)
                        <a href="{{ route('chapter',['slug' => $item->slug]) }}" class="category-card">
                            <div class="category-icon">
                                <img src="{{ asset('storage/images/icons/'.$item->icon) }}">
                            </div>
                            <h3 class="category-name">{{ $item->name }}</h3>
                            <p class="category-desc">{{ $item->description }}</p>
                            <span class="category-count">{{ $item->articles_count.' '.articlesDeclension($item->articles_count) }}</span>
                            <svg class="category-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Featured Articles -->
        <section class="featured">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Популярные статьи</h2>
                    <a href="{{ route('article',['slug' => 'all-articles']) }}" class="section-link">Все статьи <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
                </div>

                <div class="articles-grid">
                    @foreach($popular_articles as $article)
                        <article class="article-card animate-in">
                            <a href="{{ route('article',['slug' => $article->chapter->slug, 'subSlug' => $article->slug]) }}">
                                <div class="article-image">
                                    <img src="{{ asset('storage/images/articles/'.$article->image) }}" alt="{{ $article->name }}" loading="lazy">
                                    <span class="article-badge">{{ $article->chapter->name }}</span>
                                </div>
                                <div class="article-content">
                                    <h3 class="article-title">{{ $article->name }}</h3>
                                    <p class="article-excerpt">{{ $article->annotation }}</p>
                                    <div class="article-meta">
                                        <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> {{ $article->rating }}</span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about" id="about">
            <div class="container">
                <div class="about-grid">
                    <div class="about-content">
                        <h2 class="section-title">{{ $about->head }}</h2>
                        {!! $about->text !!}
                        <div class="about-stats">
                            <span><span class="dot"></span> {{ $articles_count.' '.articlesDeclension($articles_count) }}</span>
                            <span><span class="dot"></span> Еженедельные обновления</span>
                            <span><span class="dot"></span> Практические гайды</span>
                        </div>
                    </div>

                    <div class="creator-card">
                        <div class="creator-avatar">
                            <img src="{{ 'storage/images/content/'.$about->image }}" alt="Xavier Fox - создатель проекта" loading="lazy">
                            <div class="creator-badge">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                            </div>
                        </div>
                        <h3 class="creator-name">Создатель проекта</h3>
                        <p class="creator-role">System Administrator & Developer</p>
                        <p class="creator-bio">IT-специалист с многолетним опытом в системном администрировании, сетевых технологиях и разработке.</p>
                        <div class="creator-social">
                            <a href="{{ $contacts[2]->address }}"><img src="{{ asset('storage/images/icons/'.$contacts[2]->icon) }}" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
