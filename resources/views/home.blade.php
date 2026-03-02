<x-app-layout>
    @include('partials.slots', ['chapter' => null])
    <main>
        <!-- Hero Section -->
        <section class="hero" aria-labelledby="hero-title">
            <div class="container">
                <div class="hero-content">
                    <h1 id="hero-title" class="hero-title">{{ $content[0]->head }}</h1>
                    <p class="hero-description">{{ $content[0]->text }}</p>
                </div>
            </div>
        </section>

        <!-- About Creator Section -->
        <section class="about-creator" aria-labelledby="creator-title">
            <div class="container">
                <div class="creator-content">
                    <div class="creator-avatar" aria-hidden="true">
                        <img src="{{ asset('storage/images/content/'.$content[1]->image) }}" />
                    </div>
                    <div class="creator-info">
                        <h2 id="creator-title" class="creator-name">{{ $content[1]->head }}</h2>
                        <p class="creator-role">{{ $content[1]->sub_head }}</p>
                        <p class="creator-bio">{{ $content[1]->text }}</p>
                        <div class="social-links">
                            @foreach($contacts as $contact)
                                <a href="{{ $contact->address }}" class="social-link" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('storage/images/icons/'.$contact->icon) }}" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
