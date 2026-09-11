<div class="row">


    <div class="col-md-6 form-group">
        <label for="category">
            Category <span class="text-danger">*</span>
        </label>

        <select id="category" name="category" class="form-control" required>
            @foreach ([
        'rooms' => 'Rooms',
        'grounds' => 'Grounds',
        'dining' => 'Dining',
    ] as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $image->category ?? '') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>

        @error('category')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="image_path">
            Image Path or URL <span class="text-danger">*</span>
        </label>

        <input type="text" id="image_path" name="image_path" class="form-control"
            value="{{ old('image_path', $image->image_path ?? '') }}" placeholder="images/photo.jpg" required>

        @error('image_path')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


</div>

<div class="row">


    <div class="col-md-6 form-group">
        <label for="alt_text">
            Alt Text <span class="text-danger">*</span>
        </label>

        <input type="text" id="alt_text" name="alt_text" class="form-control"
            value="{{ old('alt_text', $image->alt_text ?? '') }}" placeholder="Enter image alt text" required>

        @error('alt_text')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <label for="caption">
            Caption
        </label>

        <input type="text" id="caption" name="caption" class="form-control"
            value="{{ old('caption', $image->caption ?? '') }}" placeholder="Enter image caption (optional)">

        @error('caption')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


</div>

<div class="row">


    <div class="col-md-6 form-group">
        <label for="sort_order">
            Sort Order
        </label>

        <input type="number" id="sort_order" name="sort_order" class="form-control"
            value="{{ old('sort_order', $image->sort_order ?? 0) }}" placeholder="Display order">

        @error('sort_order')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


</div>
