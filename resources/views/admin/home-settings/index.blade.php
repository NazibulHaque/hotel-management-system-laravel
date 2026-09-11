@extends('layouts.admin')

@section('title', 'Home Settings')

@section('content')

<div class="content-wrapper">

    <div class="content-header row">

        <div class="content-header-left col-md-6 col-12 mb-1">

            <h3 class="content-header-title">
                <a
                    href="{{ route('admin.home-settings.edit', $home) }}"
                    class="btn btn-primary"
                >
                    {{ __('Edit Home Settings') }}
                    <i class="feather icon-edit"></i>
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
                        {{ __('Home Settings') }}
                    </li>

                </ol>

            </div>

        </div>

    </div>


    <div class="content-body">

        <section id="home-settings">

            <div class="row">

                <div class="col-12">

                    @include('partials.session_message')

                    <div class="card rounded">

                        <div class="card-header">

                            <h4 class="card-title">
                                Home Page Settings
                            </h4>

                        </div>


                        <div class="card-content collapse show">

                            <div class="card-body card-dashboard">

                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered">

                                        <tbody>

                                            <tr>
                                                <th width="25%">
                                                    Hero Location
                                                </th>
                                                <td>
                                                    {{ $home->hero_location ?: '—' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Hero Title
                                                </th>
                                                <td>
                                                    {{ $home->hero_title ?: '—' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Hero Description
                                                </th>
                                                <td>
                                                    {{ $home->hero_description ?: '—' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Hero Image
                                                </th>
                                                <td>
                                                    {{ $home->hero_image ?: '—' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Rating
                                                </th>
                                                <td>
                                                    {{ number_format($home->rating, 1) }}
                                                    <span class="text-muted">
                                                        ({{ $home->rating_text }})
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Highlights
                                                </th>
                                                <td>
                                                    <strong>
                                                        {{ $home->highlights_title }}
                                                    </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Highlight 1
                                                </th>
                                                <td>
                                                    <strong>
                                                        {{ $home->highlight_1_title }}
                                                    </strong>
                                                    <br>
                                                    {{ $home->highlight_1_description }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Highlight 2
                                                </th>
                                                <td>
                                                    <strong>
                                                        {{ $home->highlight_2_title }}
                                                    </strong>
                                                    <br>
                                                    {{ $home->highlight_2_description }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Highlight 3
                                                </th>
                                                <td>
                                                    <strong>
                                                        {{ $home->highlight_3_title }}
                                                    </strong>
                                                    <br>
                                                    {{ $home->highlight_3_description }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Rooms Section
                                                </th>
                                                <td>
                                                    <strong>
                                                        {{ $home->rooms_title }}
                                                    </strong>
                                                    <br>
                                                    {{ $home->rooms_description }}
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>


                                <div class="mt-2">

                                    <a
                                        href="{{ route('admin.home-settings.edit', $home) }}"
                                        class="btn btn-primary"
                                    >
                                        <i class="feather icon-edit"></i>
                                        Edit Home Settings
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.home-settings.destroy', $home) }}"
                                        class="d-inline"
                                        onsubmit="return confirm('Delete home settings?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            <i class="feather icon-trash-2"></i>
                                            Delete
                                        </button>

                                    </form>

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
