<div class="row">


<div class="col-md-6 form-group">
    <label for="guest_name">
        Guest Name <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        class="form-control"
        id="guest_name"
        name="guest_name"
        placeholder="Enter guest name"
        value="{{ old('guest_name', $testimonial->guest_name ?? '') }}"
        required
    >

    @error('guest_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="col-md-6 form-group">
    <label for="rating">
        Rating (1-5) <span class="text-danger">*</span>
    </label>

    <input
        type="number"
        class="form-control"
        id="rating"
        name="rating"
        min="1"
        max="5"
        placeholder="Enter rating"
        value="{{ old('rating', $testimonial->rating ?? 5) }}"
        required
    >

    @error('rating')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


</div>

<div class="row">


<div class="col-md-12 form-group">
    <label for="quote">
        Quote <span class="text-danger">*</span>
    </label>

    <textarea
        class="form-control"
        id="quote"
        name="quote"
        rows="4"
        placeholder="Enter guest testimonial"
        required
    >{{ old('quote', $testimonial->quote ?? '') }}</textarea>

    @error('quote')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


</div>

<div class="row">


<div class="col-md-6 form-group">
    <label for="stay_context">
        Stay Context
    </label>

    <input
        type="text"
        class="form-control"
        id="stay_context"
        name="stay_context"
        placeholder="Sea View Suite, June 2026"
        value="{{ old('stay_context', $testimonial->stay_context ?? '') }}"
    >

    <small class="form-text text-muted">
        Optional information about the guest's stay.
    </small>

    @error('stay_context')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="col-md-6 form-group">
    <label for="sort_order">
        Sort Order
    </label>

    <input
        type="number"
        class="form-control"
        id="sort_order"
        name="sort_order"
        placeholder="Display order"
        value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
    >

    @error('sort_order')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


</div>

<div class="row">


<div class="col-md-6 form-group">

    <div class="custom-control custom-checkbox">

        <input
            type="checkbox"
            class="custom-control-input"
            id="is_published"
            name="is_published"
            value="1"
            {{ old('is_published', $testimonial->is_published ?? true) ? 'checked' : '' }}
        >

        <label class="custom-control-label" for="is_published">
            Published
        </label>

    </div>

</div>


</div>
