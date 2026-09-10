@extends('layouts.app')

@section('title', 'Home')

@section('content')

  <section class="hero" aria-label="Introduction">
    <div class="hero-copy">
      <span class="key-tag">Sydney, Australia</span>

      <div class="rating-wrapper">
        <div class="stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
        </div>
        <p class="rating-text">4.4 <span>(Google reviews)</span></p>
      </div>

      <h1 style="color: #fff;">Casa Ulika</h1>

      <p class="lede">
        A restored 1887 olive mill, carefully transformed into twelve
        stone-walled rooms overlooking the Sydney coast.
      </p>

      <div class="cta-row">
        <a class="btn btn-primary" href="{{ route('contact') }}">Check Availability</a>
        <a class="btn btn-ghost" href="{{ route('rooms') }}">View Rooms</a>
      </div>
    </div>
  </section>

  <section aria-labelledby="highlights-heading">
    <div class="container">
      <div class="section-head">
        <span class="key-tag">The Stay</span>
        <h2 id="highlights-heading">What guests come back for</h2>
      </div>

      <div class="grid-3">
        <article class="feature-card">
          <h3>Sea-View Rooms</h3>
          <p>Nine of twelve rooms open onto the water, with deep window seats inspired by the original mill walls.</p>
        </article>
        <article class="feature-card">
          <h3>The Olive Grove</h3>
          <p>Two hundred trees, some over a century old, continue the tradition of olive growing at Casa Ulika.</p>
        </article>
        <article class="feature-card">
          <h3>Breakfast on the Terrace</h3>
          <p>Fresh bread, olive oil, seasonal fruit, and homemade preserves are served each morning overlooking the water.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section-alt" aria-labelledby="rooms-teaser-heading">
    <div class="container">
      <div class="section-head">
        <span class="key-tag">The Rooms</span>
        <h2 id="rooms-teaser-heading">Ways to stay</h2>
        <p>Each room keeps the character of the original mill, furnished simply in linen, oak, and brass.</p>
      </div>

      <div class="grid-3">
        @foreach ($featuredRooms as $room)
          <article class="room-card">
            <figure>
              <img src="{{ Str::startsWith($room->image_path, 'http') ? $room->image_path : asset($room->image_path) }}" alt="{{ $room->name }}">
            </figure>
            <div class="room-body">
              <h3>{{ $room->name }}</h3>
              <p>{{ Str::limit($room->description, 90) }}</p>
              <div class="room-meta">
                <span>Sleeps {{ $room->sleeps }}</span>
                <span class="price">A${{ number_format($room->price_per_night, 0) }} / night</span>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      <div style="margin-top: 2.4rem;">
        <a class="btn btn-primary" href="{{ route('rooms') }}">See All Rooms &amp; Suites</a>
      </div>
    </div>
  </section>

  @if ($featuredTestimonial)
    <section class="section-dark" aria-labelledby="quote-heading">
      <div class="container">
        <span class="key-tag">From the Guestbook</span>
        <h2 id="quote-heading" style="max-width: 20ch;">&ldquo;{{ Str::limit($featuredTestimonial->quote, 70) }}&rdquo;</h2>
        <p style="opacity:0.85; max-width: 50ch;">
          — {{ $featuredTestimonial->guest_name }}, {{ $featuredTestimonial->stay_context }}.
          <a href="{{ route('testimonials') }}" style="color: var(--ochre);">Read more guest stories &rarr;</a>
        </p>
      </div>
    </section>
  @endif

@endsection
