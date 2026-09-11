@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')

<div class="content-wrapper">

    <div class="content-header row">

        <div class="content-header-left col-md-6 col-12 mb-1">

            <h3 class="content-header-title">

                <a
                    href="{{ route('admin.site-settings.edit', $settings) }}"
                    class="btn btn-primary"
                >
                    Edit Site Settings
                    <i class="feather icon-edit"></i>
                </a>

            </h3>

        </div>


        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">

            <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Site Settings
                    </li>

                </ol>

            </div>

        </div>

    </div>


    <div class="content-body">

        <section id="site-settings">

            <div class="row">

                <div class="col-12">

                    @include('partials.session_message')

                    <div class="card rounded">

                        <div class="card-header">

                            <h4 class="card-title">
                                Website Information
                            </h4>

                        </div>


                        <div class="card-content collapse show">

                            <div class="card-body card-dashboard">

                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered">

                                        <tbody>

                                            <tr>
                                                <th width="25%">Site Name</th>
                                                <td>{{ $settings->site_name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Tagline</th>
                                                <td>{{ $settings->site_tagline ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Footer Description</th>
                                                <td>{{ $settings->footer_description ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Navigate Title</th>
                                                <td>{{ $settings->footer_navigate_title ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Visit Title</th>
                                                <td>{{ $settings->footer_visit_title ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $settings->address ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td>
                                                    @if ($settings->email)
                                                        <a href="mailto:{{ $settings->email }}">
                                                            {{ $settings->email }}
                                                        </a>
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Phone</th>
                                                <td>{{ $settings->phone ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Facebook</th>
                                                <td>{{ $settings->facebook_url ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Instagram</th>
                                                <td>{{ $settings->instagram_url ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Twitter / X</th>
                                                <td>{{ $settings->twitter_url ?: '—' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Copyright</th>
                                                <td>{{ $settings->copyright_text ?: '—' }}</td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>


                                <div class="mt-2">

                                    <a
                                        href="{{ route('admin.site-settings.edit', $settings) }}"
                                        class="btn btn-primary"
                                    >
                                        <i class="feather icon-edit"></i>
                                        Edit Site Settings
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.site-settings.destroy', $settings) }}"
                                        class="d-inline"
                                        onsubmit="return confirm('Delete site settings?')"
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
