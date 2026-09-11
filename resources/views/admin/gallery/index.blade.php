@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')

<div class="content-wrapper">


<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-1">

        <h3 class="content-header-title">
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                {{ __('Add Image') }}
                <i class="feather icon-plus"></i>
            </a>
        </h3>

    </div>

    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">

        <div class="breadcrumb-wrapper col-12">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        {{ __('Home') }}
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    {{ __('Gallery') }}
                </li>

            </ol>

        </div>

    </div>

</div>

<div class="content-body">

    <section id="configuration">

        <div class="row">

            <div class="col-12">

                @include('partials.session_message')

                <div class="card rounded">

                    <div class="card-content collapse show">

                        <div class="card-body card-dashboard">

                            <h4 class="card-title">
                                Gallery List
                            </h4>

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered datatable">

                                    <thead>

                                        <tr>
                                            <th>Sl</th>
                                            <th>Preview</th>
                                            <th>Category</th>
                                            <th>Alt Text</th>
                                            <th>Caption</th>
                                            <th>Sort Order</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @forelse ($images as $image)

                                            <tr>

                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>

                                                    @if ($image->image_path)

                                                        <img
                                                            src="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}"
                                                            alt="{{ $image->alt_text }}"
                                                            style="width:70px; height:50px; object-fit:cover; border-radius:4px;"
                                                        >

                                                    @else

                                                        <span class="text-muted">
                                                            No Image
                                                        </span>

                                                    @endif

                                                </td>

                                                <td>
                                                    {{ ucfirst($image->category) }}
                                                </td>

                                                <td>
                                                    {{ $image->alt_text }}
                                                </td>

                                                <td>
                                                    {{ $image->caption ?? '—' }}
                                                </td>

                                                <td>
                                                    {{ $image->sort_order ?? 0 }}
                                                </td>

                                                <td>

                                                    <a
                                                        href="{{ route('admin.gallery.edit', $image) }}"
                                                        class="btn btn-primary"
                                                        title="Edit"
                                                    >
                                                        <i class="feather icon-edit-2"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.gallery.destroy', $image) }}"
                                                        method="POST"
                                                        style="display:inline"
                                                        onsubmit="return confirm('Delete this image?')"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger"
                                                            title="Delete"
                                                        >
                                                            <i class="feather icon-trash"></i>
                                                        </button>

                                                    </form>

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>

                                                <td colspan="7" class="text-center">
                                                    No images yet.
                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


</div>

@endsection
