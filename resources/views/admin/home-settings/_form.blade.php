<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="hero_location">
                {{ __('Hero Location') }}
            </label>

            <input type="text" id="hero_location" name="hero_location" class="form-control"
                value="{{ old('hero_location', $home->hero_location ?? '') }}" placeholder="Sydney, Australia">

            @error('hero_location')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="hero_title">
                {{ __('Hero Title') }}
            </label>

            <input type="text" id="hero_title" name="hero_title" class="form-control"
                value="{{ old('hero_title', $home->hero_title ?? '') }}" placeholder="Casa Ulika">

            @error('hero_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="hero_description">
                {{ __('Hero Description') }}
            </label>

            <textarea id="hero_description" name="hero_description" rows="4" class="form-control"
                placeholder="A restored 1887 olive mill...">{{ old('hero_description', $home->hero_description ?? '') }}</textarea>

            @error('hero_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="hero_image">
                {{ __('Hero Image') }}
            </label>

            <input type="file" id="hero_image" name="hero_image" class="form-control"
                accept="image/jpeg,image/png,image/jpg,image/webp">

            @error('hero_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            @if (isset($home) && $home->hero_image)
                <div class="mt-2">
                    <img src="{{ \Illuminate\Support\Str::startsWith($home->hero_image, 'http')
                        ? $home->hero_image
                        : asset($home->hero_image) }}"
                        alt="Hero Image" style="max-width: 300px; height: auto; border-radius: 5px;">

                    <p class="text-muted mt-1 mb-0">
                        Leave empty to keep the current image.
                    </p>
                </div>
            @endif
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="rating">
                {{ __('Rating') }}
            </label>

            <input type="number" id="rating" name="rating" class="form-control"
                value="{{ old('rating', $home->rating ?? '4.4') }}" min="0" max="5" step="0.1">

            @error('rating')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="rating_text">
                {{ __('Rating Text') }}
            </label>

            <input type="text" id="rating_text" name="rating_text" class="form-control"
                value="{{ old('rating_text', $home->rating_text ?? '') }}" placeholder="Google reviews">

            @error('rating_text')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<hr>

<h4 class="mb-2">Highlights Section</h4>


<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="highlights_tag">
                {{ __('Section Tag') }}
            </label>

            <input type="text" id="highlights_tag" name="highlights_tag" class="form-control"
                value="{{ old('highlights_tag', $home->highlights_tag ?? '') }}" placeholder="The Stay">

            @error('highlights_tag')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="highlights_title">
                {{ __('Section Title') }}
            </label>

            <input type="text" id="highlights_title" name="highlights_title" class="form-control"
                value="{{ old('highlights_title', $home->highlights_title ?? '') }}"
                placeholder="What guests come back for">

            @error('highlights_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-4">

        <div class="card border mb-2">
            <div class="card-header">
                <h4 class="card-title">Highlight 1</h4>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="highlight_1_title">Title</label>

                    <input type="text" id="highlight_1_title" name="highlight_1_title" class="form-control"
                        value="{{ old('highlight_1_title', $home->highlight_1_title ?? '') }}"
                        placeholder="Sea-View Rooms">

                    @error('highlight_1_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="highlight_1_description">Description</label>

                    <textarea id="highlight_1_description" name="highlight_1_description" rows="5" class="form-control"
                        placeholder="Highlight description...">{{ old('highlight_1_description', $home->highlight_1_description ?? '') }}</textarea>

                    @error('highlight_1_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

    </div>


    <div class="col-md-4">

        <div class="card border mb-2">
            <div class="card-header">
                <h4 class="card-title">Highlight 2</h4>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="highlight_2_title">Title</label>

                    <input type="text" id="highlight_2_title" name="highlight_2_title" class="form-control"
                        value="{{ old('highlight_2_title', $home->highlight_2_title ?? '') }}"
                        placeholder="The Olive Grove">

                    @error('highlight_2_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="highlight_2_description">Description</label>

                    <textarea id="highlight_2_description" name="highlight_2_description" rows="5" class="form-control"
                        placeholder="Highlight description...">{{ old('highlight_2_description', $home->highlight_2_description ?? '') }}</textarea>

                    @error('highlight_2_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

    </div>


    <div class="col-md-4">

        <div class="card border mb-2">
            <div class="card-header">
                <h4 class="card-title">Highlight 3</h4>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="highlight_3_title">Title</label>

                    <input type="text" id="highlight_3_title" name="highlight_3_title" class="form-control"
                        value="{{ old('highlight_3_title', $home->highlight_3_title ?? '') }}"
                        placeholder="Breakfast on the Terrace">

                    @error('highlight_3_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="highlight_3_description">Description</label>

                    <textarea id="highlight_3_description" name="highlight_3_description" rows="5" class="form-control"
                        placeholder="Highlight description...">{{ old('highlight_3_description', $home->highlight_3_description ?? '') }}</textarea>

                    @error('highlight_3_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

    </div>

</div>


<hr>

<h4 class="mb-2">Rooms Section</h4>


<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="rooms_tag">
                {{ __('Section Tag') }}
            </label>

            <input type="text" id="rooms_tag" name="rooms_tag" class="form-control"
                value="{{ old('rooms_tag', $home->rooms_tag ?? '') }}" placeholder="The Rooms">

            @error('rooms_tag')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-8">
        <div class="form-group">
            <label for="rooms_title">
                {{ __('Section Title') }}
            </label>

            <input type="text" id="rooms_title" name="rooms_title" class="form-control"
                value="{{ old('rooms_title', $home->rooms_title ?? '') }}" placeholder="Ways to stay">

            @error('rooms_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="rooms_description">
                {{ __('Rooms Description') }}
            </label>

            <textarea id="rooms_description" name="rooms_description" rows="4" class="form-control"
                placeholder="Each room keeps the character of the original mill...">{{ old('rooms_description', $home->rooms_description ?? '') }}</textarea>

            @error('rooms_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
