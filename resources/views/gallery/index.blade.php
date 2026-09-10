@extends('layouts.app')

@section('title', 'Gallery')

@section('content')

  <section class="page-hero">
    <div class="container">
      <span class="key-tag">Gallery</span>
      <h1>A look around Casa Ulika</h1>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="filter-row" role="group" aria-label="Filter gallery by category">
        <button class="filter-btn" data-category="all" aria-pressed="true">All</button>
        <button class="filter-btn" data-category="rooms" aria-pressed="false">Rooms</button>
        <button class="filter-btn" data-category="grounds" aria-pressed="false">Grounds</button>
        <button class="filter-btn" data-category="dining" aria-pressed="false">Dining</button>
      </div>

      <div class="gallery-grid">
        @foreach ($images as $image)
          <figure class="gallery-item" data-category="{{ $image->category }}">
            <img src="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}"
              alt="{{ $image->alt_text }}" loading="lazy">
            @if ($image->caption)
              <figcaption>{{ $image->caption }}</figcaption>
            @endif
          </figure>
        @endforeach
      </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
  // Simple client-side filter — categories come from the server, filtering is just UX sugar.
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const category = btn.dataset.category;
      document.querySelectorAll('.filter-btn').forEach(b => b.setAttribute('aria-pressed', b === btn));
      document.querySelectorAll('.gallery-item').forEach(item => {
        item.style.display = (category === 'all' || item.dataset.category === category) ? '' : 'none';
      });
    });
  });
</script>
@endpush
