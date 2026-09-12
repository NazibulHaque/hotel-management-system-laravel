<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', $settings->site_name ?? 'Casa Ulika')
        —
        {{ $settings->site_tagline ?? 'A Restored Olive Mill in Sydney' }}
    </title>

    <meta
        name="description"
        content="{{ $settings->footer_description ?? 'A restored 1887 olive mill in Sydney, Australia — twelve rooms, a working olive grove, and the sea at the door.' }}"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Public+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >

    @stack('styles')

</head>


<body>

    <a
        class="skip-link"
        href="#main"
    >
        Skip to content
    </a>


    {{-- ================= HEADER ================= --}}

    <header class="site-header">

        <div class="nav-wrap">

            <a
                href="{{ route('home') }}"
                class="wordmark"
            >
                {{ $settings->site_name ?? 'Casa Ulika' }}
            </a>


            <button
                class="nav-toggle"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
                aria-controls="main-nav"
            >
                <span></span>
            </button>


            <nav
                class="main-nav"
                id="main-nav"
                aria-label="Primary"
            >

                <ul>

                    <li>
                        <a
                            href="{{ route('home') }}"
                            @if(request()->routeIs('home')) aria-current="page" @endif
                        >
                            Home
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('about') }}"
                            @if(request()->routeIs('about')) aria-current="page" @endif
                        >
                            About
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('rooms') }}"
                            @if(request()->routeIs('rooms')) aria-current="page" @endif
                        >
                            Rooms
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('gallery') }}"
                            @if(request()->routeIs('gallery')) aria-current="page" @endif
                        >
                            Gallery
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('testimonials') }}"
                            @if(request()->routeIs('testimonials')) aria-current="page" @endif
                        >
                            Testimonials
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('contact') }}"
                            @if(request()->routeIs('contact')) aria-current="page" @endif
                        >
                            Contact
                        </a>
                    </li>

                </ul>

            </nav>

        </div>

    </header>


    {{-- ================= MAIN ================= --}}

    <main id="main">

        @yield('content')

    </main>


    {{-- ================= FOOTER ================= --}}

    <footer class="site-footer">

        <div class="container">

            <div class="footer-grid">


                {{-- Brand --}}

                <div>

                    <a
                        href="{{ route('home') }}"
                        class="wordmark"
                    >
                        {{ $settings->site_name ?? 'Casa Ulika' }}
                    </a>


                    <p
                        style="margin-top:1rem; opacity:0.85; max-width:32ch;"
                    >
                        {{ $settings->footer_description ?? 'A restored 1887 olive mill in Sydney, Australia — twelve rooms, a working olive grove, and the sea at the door.' }}
                    </p>

                </div>


                {{-- Navigation --}}

                <div>

                    <h4>
                        {{ $settings->footer_navigate_title ?? 'Navigate' }}
                    </h4>

                    <ul>

                        <li>
                            <a href="{{ route('rooms') }}">
                                Rooms &amp; Suites
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('gallery') }}">
                                Gallery
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('testimonials') }}">
                                Testimonials
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- Contact / Visit --}}

                <div>

                    <h4>
                        {{ $settings->footer_visit_title ?? 'Visit' }}
                    </h4>

                    <ul>

                        <li>
                            {{ $settings->address ?? 'Ulica Maslina 12, Sydney, Australia' }}
                        </li>


                        <li>
                            <a href="mailto:{{ $settings->email ?? 'stay@casaulika.example' }}">
                                {{ $settings->email ?? 'stay@casaulika.example' }}
                            </a>
                        </li>


                        @if ($settings && $settings->phone)
                            <li>
                                <a href="tel:{{ $settings->phone }}">
                                    {{ $settings->phone }}
                                </a>
                            </li>
                        @endif

                    </ul>

                </div>


            </div>


            {{-- ================= SOCIAL MEDIA ================= --}}

            @if (
                ($settings && $settings->facebook_url) ||
                ($settings && $settings->instagram_url) ||
                ($settings && $settings->twitter_url)
            )

                <div class="footer-social">

                    @if ($settings->facebook_url)

                        <a
                            href="{{ $settings->facebook_url }}"
                            target="_blank"
                            rel="noopener"
                            aria-label="Facebook"
                        >
                            <i class="fab fa-facebook-f"></i>
                        </a>

                    @endif


                    @if ($settings->instagram_url)

                        <a
                            href="{{ $settings->instagram_url }}"
                            target="_blank"
                            rel="noopener"
                            aria-label="Instagram"
                        >
                            <i class="fab fa-instagram"></i>
                        </a>

                    @endif


                    @if ($settings->twitter_url)

                        <a
                            href="{{ $settings->twitter_url }}"
                            target="_blank"
                            rel="noopener"
                            aria-label="Twitter"
                        >
                            <i class="fab fa-x-twitter"></i>
                        </a>

                    @endif

                </div>

            @endif


            {{-- ================= COPYRIGHT ================= --}}

            <div class="footer-bottom">

                <p>

                    &copy; {{ date('Y') }}

                    {{ $settings->site_name ?? 'Casa Ulika' }}.

                    {{ $settings->copyright_text ?? 'All rights reserved.' }}

                </p>

            </div>

        </div>

    </footer>


    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')

</body>

</html>

