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
            Image <span class="text-danger">*</span>
        </label>

        <input
            type="file"
            id="image_path"
            name="image_path"
            class="form-control"
            accept="image/jpeg,image/png,image/jpg,image/webp"
            @if(!isset($image)) required @endif
        >

        @error('image_path')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        @if(isset($image) && $image->image_path)

            <div class="mt-2">

                <img
                    src="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}"
                    alt="{{ $image->alt_text ?? 'Gallery image' }}"
                    style="max-width: 200px; height: auto; border-radius: 5px;"
                >

                <p class="text-muted mt-1 mb-0">
                    Current image
                </p>

            </div>

        @endif

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
