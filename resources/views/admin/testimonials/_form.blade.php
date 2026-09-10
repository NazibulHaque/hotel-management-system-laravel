<form method="POST" action="{{ $action }}">
  @csrf
  @if ($method !== 'POST') @method($method) @endif

  <div class="field">
    <label for="guest_name">Guest name</label>
    <input type="text" id="guest_name" name="guest_name" value="{{ old('guest_name', $testimonial->guest_name ?? '') }}" required>
    @error('guest_name') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="quote">Quote</label>
    <textarea id="quote" name="quote" rows="3" required>{{ old('quote', $testimonial->quote ?? '') }}</textarea>
    @error('quote') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="rating">Rating (1-5)</label>
    <input type="number" id="rating" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}" required>
    @error('rating') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="stay_context">Stay context (optional)</label>
    <input type="text" id="stay_context" name="stay_context" value="{{ old('stay_context', $testimonial->stay_context ?? '') }}" placeholder="Sea View Suite, June 2026">
    @error('stay_context') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="sort_order">Sort order</label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
  </div>

  <div class="field">
    <label><input type="checkbox" name="is_published" value="1" style="width:auto" {{ old('is_published', $testimonial->is_published ?? true) ? 'checked' : '' }}> Published</label>
  </div>

  <button type="submit" class="btn">Save</button>
  <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
</form>
