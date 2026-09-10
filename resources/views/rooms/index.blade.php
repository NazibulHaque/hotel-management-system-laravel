@extends('layouts.app')

@section('title', 'Rooms & Suites')

@section('content')

  <section class="page-hero">
    <div class="container">
      <span class="key-tag">Rooms &amp; Suites</span>
      <h1>Twelve rooms, four styles</h1>
      <p class="lede">Each room keeps the character of the original mill, furnished simply in linen, oak, and brass.</p>
    </div>
  </section>

  <section>
    <div class="container grid-2">
      @forelse ($rooms as $room)
        <article class="room-card">
          <figure>
            <img src="{{ Str::startsWith($room->image_path, 'http') ? $room->image_path : asset($room->image_path) }}" alt="{{ $room->name }}">
          </figure>

          <div class="room-body">
            <h3>{{ $room->name }}</h3>
            <p>{{ $room->description }}</p>

            @if ($room->amenities)
              <ul class="amenity-list">
                @if ($room->size_sqm)<li>{{ $room->size_sqm }} m&sup2;</li>@endif
                @foreach ($room->amenities as $amenity)
                  <li>{{ $amenity }}</li>
                @endforeach
              </ul>
            @endif

            <div class="room-meta">
              <span>Sleeps {{ $room->sleeps }}</span>
              <span class="price">A${{ number_format($room->price_per_night, 0) }} / night</span>
            </div>

            <div style="margin-top: 1rem;">
              <a class="btn btn-primary" href="{{ route('contact') }}?room={{ $room->slug }}">Enquire</a>
            </div>
          </div>
        </article>
      @empty
        <p>No rooms are published right now — please check back soon.</p>
      @endforelse
    </div>
  </section>

@endsection
