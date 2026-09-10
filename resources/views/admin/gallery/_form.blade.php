<form method="POST" action="{{ $action }}">
  @csrf
  @if ($method !== 'POST') @method($method) @endif

  <div class="field">
    <label for="category">Category</label>
    <select id="category" name="category" required>
      @foreach (['rooms' => 'Rooms', 'grounds' => 'Grounds', 'dining' => 'Dining'] as $value => $label)
        <option value="{{ $value }}" @selected(old('category', $image->category ?? '') === $value)>{{ $label }}</option>
      @endforeach
    </select>
    @error('category') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="image_path">Image path or URL</label>
    <input type="text" id="image_path" name="image_path" value="{{ old('image_path', $image->image_path ?? '') }}" required placeholder="images/photo.jpg">
    @error('image_path') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="alt_text">Alt text</label>
    <input type="text" id="alt_text" name="alt_text" value="{{ old('alt_text', $image->alt_text ?? '') }}" required>
    @error('alt_text') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="caption">Caption (optional)</label>
    <input type="text" id="caption" name="caption" value="{{ old('caption', $image->caption ?? '') }}">
    @error('caption') <p class="error">{{ $message }}</p> @enderror
  </div>

  <div class="field">
    <label for="sort_order">Sort order</label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $image->sort_order ?? 0) }}">
  </div>

  <button type="submit" class="btn">Save</button>
  <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Cancel</a>
</form>
