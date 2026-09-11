@extends('layouts.admin')

@section('title', 'Create Site Settings')

@section('content')

<div class="content-wrapper">

    <div class="content-header row">

        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">
                Create Site Settings
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

                    <li class="breadcrumb-item">
                        Site Settings
                    </li>

                    <li class="breadcrumb-item active">
                        Create
                    </li>

                </ol>

            </div>

        </div>

    </div>


    <div class="content-body">

        <section id="basic-form">

            <div class="row">

                <div class="col-12">

                    @include('partials.session_message')

                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">
                                Add Site Settings
                            </h4>
                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body card-dashboard">

                                <form
                                    method="POST"
                                    action="{{ route('admin.site-settings.store') }}"
                                    class="form"
                                >

                                    @csrf

                                    <div class="form-body">

                                        @include('admin.site-settings._form', [
                                            'settings' => null
                                        ])

                                    </div>

                                    <div class="form-actions right">

                                        <a
                                            href="{{ route('admin.dashboard') }}"
                                            class="btn btn-secondary mr-1"
                                        >
                                            <i class="feather icon-x"></i>
                                            Cancel
                                        </a>

                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-check-square-o"></i>
                                            Submit
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</div>

@endsection
