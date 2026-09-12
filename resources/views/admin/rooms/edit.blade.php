@extends('layouts.admin')

@section('title', 'Edit Room')

@section('content')

    <div class="content-wrapper">


        <div class="content-header row">

            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary">
                        {{ __('Room List') }}
                        <i class="feather icon-eye"></i>
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

                        <li class="breadcrumb-item">
                            {{ __('Rooms') }}
                        </li>

                        <li class="breadcrumb-item active">
                            {{ __('Edit Room') }}
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
                                <h4 class="card-title">Edit Room</h4>
                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body card-dashboard">

                                    <form method="POST" action="{{ route('admin.rooms.update', $room) }}" class="form" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-body">

                                            @include('admin.rooms._form', [
                                                'room' => $room,
                                            ])

                                        </div>

                                        <div class="form-actions right">

                                            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary mr-1">
                                                <i class="feather icon-x"></i>
                                                Cancel
                                            </a>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i>
                                                Update
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
