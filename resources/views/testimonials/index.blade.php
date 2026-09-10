@extends('layouts.app')

@section('title', 'Testimonials')

@section('content')

  <section class="page-hero">
    <div class="container">
      <span class="key-tag">Testimonials</span>
      <h1>Stories from the guestbook</h1>
    </div>
  </section>

  <section>
    <div class="container grid-3">
      @foreach ($testimonials as $t)
        <article class="quote-card">
          <div class="stars" aria-label="Rated {{ $t->rating }} out of 5 stars">
            @for ($i = 0; $i < 5; $i++)
              {{ $i < $t->rating ? '★' : '☆' }}
            @endfor
          </div>

          <blockquote>&ldquo;{{ $t->quote }}&rdquo;</blockquote>

          <cite>{{ $t->guest_name }} @if($t->stay_context) &middot; {{ $t->stay_context }} @endif</cite>
        </article>
      @endforeach
    </div>
  </section>

@endsection
