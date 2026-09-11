<div class="row">

    <div class="col-md-6 form-group">
        <label for="name">
            Name <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter room name"
            value="{{ old('name', $room->name ?? '') }}" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="price_per_night">
            Price per night (A$) <span class="text-danger">*</span>
        </label>
        <input type="number" step="0.01" class="form-control" id="price_per_night" name="price_per_night"
            placeholder="Enter price per night" value="{{ old('price_per_night', $room->price_per_night ?? '') }}"
            required>
        @error('price_per_night')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>

<div class="row">

    <div class="col-md-12 form-group">
        <label for="description">
            Description <span class="text-danger">*</span>
        </label>
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter room description"
            required>{{ old('description', $room->description ?? '') }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>

<div class="row">
    <div class="col-md-4 form-group">
        <label for="sleeps">
            Sleeps <span class="text-danger">*</span>
        </label>
        <input type="number" class="form-control" id="sleeps" name="sleeps" placeholder="Number of guests"
            value="{{ old('sleeps', $room->sleeps ?? 2) }}" required>
        @error('sleeps')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <label for="size_sqm">
            Size (m²)
        </label>
        <input type="number" class="form-control" id="size_sqm" name="size_sqm" placeholder="Room size"
            value="{{ old('size_sqm', $room->size_sqm ?? '') }}">
        @error('size_sqm')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <label for="sort_order">
            Sort order
        </label>
        <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="Display order"
            value="{{ old('sort_order', $room->sort_order ?? 0) }}">
        @error('sort_order')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>

<div class="row">

    <div class="col-md-6 form-group">
        <label for="amenities">
            Amenities
        </label>
        <input type="text" class="form-control" id="amenities" name="amenities"
            placeholder="Sea view, Rain shower, Ceiling fan"
            value="{{ old('amenities', $room ? implode(', ', $room->amenities ?? []) : '') }}">
        <small class="form-text text-muted">
            Enter amenities separated by commas.
        </small>
        @error('amenities')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="image_path">
            Image path or URL
        </label>
        <input type="text" class="form-control" id="image_path" name="image_path" placeholder="images/room.jpg"
            value="{{ old('image_path', $room->image_path ?? '') }}">
        @error('image_path')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>

<div class="row">

    <div class="col-md-6 form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1"
                {{ old('is_published', $room->is_published ?? true) ? 'checked' : '' }}>
            <label class="custom-control-label" for="is_published">
                Published
            </label>
        </div>
    </div>

</div>
