@extends('layouts.app')

@section('title', 'Home')

@section('content')

  {{-- ================= HERO ================= --}}

  <section class="hero" aria-label="Introduction">
    <div class="hero-copy">

      <span class="key-tag">
        {{ $homeSetting->hero_location ?? 'Sydney, Australia' }}
      </span>


      <div class="rating-wrapper">

        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>

        <p class="rating-text">
          {{ $homeSetting->hero_rating ?? '4.4' }}
          <span>
            ({{ $homeSetting->hero_rating_text ?? 'Google reviews' }})
          </span>
        </p>

      </div>


      <h1 style="color: #fff;">
        {{ $homeSetting->hero_title ?? 'Casa Ulika' }}
      </h1>


      <p class="lede">
        {{ $homeSetting->hero_description ?? 'A restored 1887 olive mill, carefully transformed into twelve stone-walled rooms overlooking the Sydney coast.' }}
      </p>


      <div class="cta-row">

        <a
          class="btn btn-primary"
          href="{{ route('contact') }}"
        >
          {{ $homeSetting->hero_primary_button ?? 'Check Availability' }}
        </a>


        <a
          class="btn btn-ghost"
          href="{{ route('rooms') }}"
        >
          {{ $homeSetting->hero_secondary_button ?? 'View Rooms' }}
        </a>

      </div>

    </div>
  </section>


  {{-- ================= HIGHLIGHTS ================= --}}

  <section aria-labelledby="highlights-heading">

    <div class="container">

      <div class="section-head">

        <span class="key-tag">
          {{ $homeSetting->highlights_label ?? 'The Stay' }}
        </span>

        <h2 id="highlights-heading">
          {{ $homeSetting->highlights_title ?? 'What guests come back for' }}
        </h2>

      </div>


      <div class="grid-3">


        {{-- Highlight 1 --}}

        <article class="feature-card">

          <h3>
            {{ $homeSetting->highlight_1_title ?? 'Sea-View Rooms' }}
          </h3>

          <p>
            {{ $homeSetting->highlight_1_description ?? 'Nine of twelve rooms open onto the water, with deep window seats inspired by the original mill walls.' }}
          </p>

        </article>


        {{-- Highlight 2 --}}

        <article class="feature-card">

          <h3>
            {{ $homeSetting->highlight_2_title ?? 'The Olive Grove' }}
          </h3>

          <p>
            {{ $homeSetting->highlight_2_description ?? 'Two hundred trees, some over a century old, continue the tradition of olive growing at Casa Ulika.' }}
          </p>

        </article>


        {{-- Highlight 3 --}}

        <article class="feature-card">

          <h3>
            {{ $homeSetting->highlight_3_title ?? 'Breakfast on the Terrace' }}
          </h3>

          <p>
            {{ $homeSetting->highlight_3_description ?? 'Fresh bread, olive oil, seasonal fruit, and homemade preserves are served each morning overlooking the water.' }}
          </p>

        </article>


      </div>

    </div>

  </section>


  {{-- ================= ROOMS ================= --}}

  <section
    class="section-alt"
    aria-labelledby="rooms-teaser-heading"
  >

    <div class="container">

      <div class="section-head">

        <span class="key-tag">
          {{ $homeSetting->rooms_label ?? 'The Rooms' }}
        </span>

        <h2 id="rooms-teaser-heading">
          {{ $homeSetting->rooms_title ?? 'Ways to stay' }}
        </h2>

        <p>
          {{ $homeSetting->rooms_description ?? 'Each room keeps the character of the original mill, furnished simply in linen, oak, and brass.' }}
        </p>

      </div>


      <div class="grid-3">

        @foreach ($featuredRooms as $room)

          <article class="room-card">

            <figure>

              <img
                src="{{ Str::startsWith($room->image_path, 'http') ? $room->image_path : asset($room->image_path) }}"
                alt="{{ $room->name }}"
              >

            </figure>


            <div class="room-body">

              <h3>
                {{ $room->name }}
              </h3>


              <p>
                {{ Str::limit($room->description, 90) }}
              </p>


              <div class="room-meta">

                <span>
                  Sleeps {{ $room->sleeps }}
                </span>

                <span class="price">
                  A${{ number_format($room->price_per_night, 0) }} / night
                </span>

              </div>

            </div>

          </article>

        @endforeach

      </div>


      <div style="margin-top: 2.4rem;">

        <a
          class="btn btn-primary"
          href="{{ route('rooms') }}"
        >
          {{ $homeSetting->rooms_button_text ?? 'See All Rooms & Suites' }}
        </a>

      </div>

    </div>

  </section>


  {{-- ================= TESTIMONIAL ================= --}}

  @if ($featuredTestimonial)

    <section
      class="section-dark"
      aria-labelledby="quote-heading"
    >

      <div class="container">

        <span class="key-tag">
          {{ $homeSetting->testimonial_label ?? 'From the Guestbook' }}
        </span>


        <h2
          id="quote-heading"
          style="max-width: 20ch;"
        >
          &ldquo;{{ Str::limit($featuredTestimonial->quote, 70) }}&rdquo;
        </h2>


        <p
          style="opacity:0.85; max-width: 50ch;"
        >

          — {{ $featuredTestimonial->guest_name }},
          {{ $featuredTestimonial->stay_context }}.

          <a
            href="{{ route('testimonials') }}"
            style="color: var(--ochre);"
          >
            {{ $homeSetting->testimonial_link_text ?? 'Read more guest stories →' }}
          </a>

        </p>

      </div>

    </section>

  @endif

@endsection

