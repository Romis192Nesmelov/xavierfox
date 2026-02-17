<x-slot name="main_nav">
    <nav class="nav scrolled" id="nav">
        <div class="nav-container">
            <div class="nav-left">
                @for ($i=0;$i<round(count($nav_links)/2);$i++)
                    @include('layouts.partials.menu_item', ['item' => $nav_links[$i]])
                @endfor
            </div>
            <a href="{{ route('home') }}" class="nav-logo">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Xavier Fox Communications" class="logo-img">
            </a>
            <div class="nav-right">
                @for ($i=round(count($nav_links)/2);$i<count($nav_links);$i++)
                    @include('layouts.partials.menu_item', ['item' => $nav_links[$i]])
                @endfor
            </div>
        </div>
    </nav>
</x-slot>
<x-slot name="footer">
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="{{ asset('storage/images/logo.png') }}" alt="Xavier Fox Communications">
                        <div>
                            <h3>XAVIER FOX</h3>
                            <span>COMMUNICATIONS</span>
                        </div>
                    </div>
                    <p>Профессиональные IT-статьи и руководства для специалистов и энтузиастов информационных технологий.</p>
                </div>

                <div class="footer-links">
                    <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg> Разделы</h4>
                    <ul>
                        @foreach($nav_links as $nav_link)
                            <li><a href="{{ route('chapter',['slug' => $nav_link->slug]) }}">{{ $nav_link->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="footer-contact">
                    <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg> Контакты</h4>
                    <ul>
                        @foreach($contacts as $contact)
                            <li>
                                <img width="15" src="{{ asset('storage/images/icons/'.$contact->icon) }}" />
                                <a href="{{ $contact->address }}" target="_blank">{{ $contact->address }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} Xavier Fox Communications. Все права защищены.</p>
                <p>Made with <span class="heart">♥</span> for IT community</p>
            </div>
        </div>
    </footer>
</x-slot>
