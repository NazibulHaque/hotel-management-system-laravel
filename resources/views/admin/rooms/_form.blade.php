<form method="POST" action="{{ $action }}">
  @csrf
  @if ($method !== 'POST') @method($method) @endif

  <div class="field">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $room->name ?? '') }}" required>
    @error('name') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3" required>{{ old('description', $room->description ?? '') }}</textarea>
    @error('description') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="price_per_night">Price per night (A$)</label>
    <input type="number" step="0.01" id="price_per_night" name="price_per_night" value="{{ old('price_per_night', $room->price_per_night ?? '') }}" required>
    @error('price_per_night') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="sleeps">Sleeps</label>
    <input type="number" id="sleeps" name="sleeps" value="{{ old('sleeps', $room->sleeps ?? 2) }}" required>
    @error('sleeps') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="size_sqm">Size (m&sup2;)</label>
    <input type="number" id="size_sqm" name="size_sqm" value="{{ old('size_sqm', $room->size_sqm ?? '') }}">
    @error('size_sqm') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="amenities">Amenities (comma-separated)</label>
    <input type="text" id="amenities" name="amenities" value="{{ old('amenities', $room ? implode(', ', $room->amenities ?? []) : '') }}" placeholder="Sea view, Rain shower, Ceiling fan">
    @error('amenities') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="image_path">Image path or URL</label>
    <input type="text" id="image_path" name="image_path" value="{{ old('image_path', $room->image_path ?? '') }}" placeholder="images/room.jpg">
    @error('image_path') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="sort_order">Sort order</label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $room->sort_order ?? 0) }}">
  </div>

  <div class="field">
    <label><input type="checkbox" name="is_published" value="1" style="width:auto" {{ old('is_published', $room->is_published ?? true) ? 'checked' : '' }}> Published</label>
  </div>

  <button type="submit" class="btn">Save</button>
  <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Cancel</a>
</form>
