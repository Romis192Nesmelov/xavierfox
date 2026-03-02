<x-slot name="vite_files">
    @vite([
        'resources/js/main.js',
        'resources/js/article.js',
        'resources/css/style.css',
    ])
</x-slot>
<x-slot name="main_nav">
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo" aria-label="Xavier Fox Communications - главная страница">
                    <div class="logo-icon">
                        <img src="{{ asset('storage/images/logo.svg') }}" />
                    </div>
                </a>
                <nav class="main-nav" aria-label="Основная навигация">
                    <ul class="nav-list">
                        @foreach($nav_links as $item)
                            @include('layouts.partials.menu_item')
                        @endforeach
                    </ul>
                </nav>
                <button class="mobile-menu-toggle" aria-label="Открыть меню" aria-expanded="false" aria-controls="mobile-nav">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <!-- Mobile Navigation -->
        <nav id="mobile-nav" class="mobile-nav" aria-label="Мобильная навигация" hidden="">
            <ul class="mobile-nav-list">
                @foreach($nav_links as $item)
                    @include('layouts.partials.menu_item')
                @endforeach
            </ul>
        </nav>
    </header>
</x-slot>

<x-slot name="footer">
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <svg viewBox="0 0 300 80" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <text x="10" y="55" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="currentColor">Xavier Fox</text>
                        <text x="185" y="55" font-family="Arial, sans-serif" font-size="24" fill="#e63946">Communications</text>
                        <circle cx="260" cy="25" r="8" fill="#e63946"></circle>
                    </svg>
                </div>
                <div class="footer-contact">
                    @foreach($contacts as $contact)
                        <a href="{{ $contact->address }}" class="footer-email">{{ str_replace(['mailto:','https://t.me/','https://wa.me/'],'',$contact->address) }}</a>
                    @endforeach
                </div>
                <div class="footer-copyright">
                    <p>{{ '© '.date('Y').' '.env('APP_NAME') }}. Все права защищены.</p>
                </div>
            </div>
        </div>
    </footer>
</x-slot>
