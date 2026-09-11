<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="site_name">
                Site Name <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                id="site_name"
                name="site_name"
                class="form-control"
                value="{{ old('site_name', $settings->site_name ?? '') }}"
                placeholder="Casa Ulika"
                required
            >

            @error('site_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="site_tagline">
                Site Tagline
            </label>

            <input
                type="text"
                id="site_tagline"
                name="site_tagline"
                class="form-control"
                value="{{ old('site_tagline', $settings->site_tagline ?? '') }}"
                placeholder="A Restored Olive Mill in Sydney"
            >

            @error('site_tagline')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<hr>

<h4 class="mb-2">Footer Information</h4>


<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="footer_description">
                Footer Description
            </label>

            <textarea
                id="footer_description"
                name="footer_description"
                rows="4"
                class="form-control"
                placeholder="A restored 1887 olive mill in Sydney, Australia..."
            >{{ old('footer_description', $settings->footer_description ?? '') }}</textarea>

            @error('footer_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="footer_navigate_title">
                Navigate Section Title
            </label>

            <input
                type="text"
                id="footer_navigate_title"
                name="footer_navigate_title"
                class="form-control"
                value="{{ old('footer_navigate_title', $settings->footer_navigate_title ?? '') }}"
                placeholder="Navigate"
            >

            @error('footer_navigate_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="footer_visit_title">
                Visit Section Title
            </label>

            <input
                type="text"
                id="footer_visit_title"
                name="footer_visit_title"
                class="form-control"
                value="{{ old('footer_visit_title', $settings->footer_visit_title ?? '') }}"
                placeholder="Visit"
            >

            @error('footer_visit_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<hr>

<h4 class="mb-2">Contact Information</h4>


<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">
                Address
            </label>

            <input
                type="text"
                id="address"
                name="address"
                class="form-control"
                value="{{ old('address', $settings->address ?? '') }}"
                placeholder="Ulica Maslina 12, Sydney, Australia"
            >

            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email', $settings->email ?? '') }}"
                placeholder="stay@casaulika.example"
            >

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="phone">
                Phone
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                class="form-control"
                value="{{ old('phone', $settings->phone ?? '') }}"
                placeholder="+61 400 000 000"
            >

            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<hr>

<h4 class="mb-2">Social Media</h4>


<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="facebook_url">
                Facebook URL
            </label>

            <input
                type="url"
                id="facebook_url"
                name="facebook_url"
                class="form-control"
                value="{{ old('facebook_url', $settings->facebook_url ?? '') }}"
                placeholder="https://facebook.com/..."
            >

            @error('facebook_url')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label for="instagram_url">
                Instagram URL
            </label>

            <input
                type="url"
                id="instagram_url"
                name="instagram_url"
                class="form-control"
                value="{{ old('instagram_url', $settings->instagram_url ?? '') }}"
                placeholder="https://instagram.com/..."
            >

            @error('instagram_url')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label for="twitter_url">
                Twitter / X URL
            </label>

            <input
                type="url"
                id="twitter_url"
                name="twitter_url"
                class="form-control"
                value="{{ old('twitter_url', $settings->twitter_url ?? '') }}"
                placeholder="https://x.com/..."
            >

            @error('twitter_url')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>


<hr>

<h4 class="mb-2">Copyright</h4>


<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="copyright_text">
                Copyright Text
            </label>

            <input
                type="text"
                id="copyright_text"
                name="copyright_text"
                class="form-control"
                value="{{ old('copyright_text', $settings->copyright_text ?? '') }}"
                placeholder="All rights reserved."
            >

            @error('copyright_text')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
