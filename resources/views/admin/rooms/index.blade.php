@extends('layouts.admin')

@section('title', 'Rooms')

@section('content')

<div class="content-wrapper">
<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-1">

        <h3 class="content-header-title">

            <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
                {{ __('Add Room') }}
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
                    {{ __('Rooms') }}
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
                                Room List
                            </h4>

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered datatable">

                                    <thead>

                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Price / Night</th>
                                            <th>Sleeps</th>
                                            <th>Size</th>
                                            <th>Amenities</th>
                                            <th>Published</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @if ($rooms->count() > 0)

                                            @foreach ($rooms as $room)

                                                <tr>

                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        {{ $room->name }}
                                                    </td>

                                                    <td>
                                                        A${{ number_format($room->price_per_night, 2) }}
                                                    </td>

                                                    <td>
                                                        {{ $room->sleeps }}
                                                    </td>

                                                    <td>
                                                        {{ $room->size_sqm ? $room->size_sqm . ' m²' : '—' }}
                                                    </td>

                                                    <td>
                                                        {{ $room->amenities ? implode(', ', $room->amenities) : '—' }}
                                                    </td>

                                                    <td>

                                                        @if ($room->is_published)
                                                            <span class="badge badge-success">
                                                                Published
                                                            </span>
                                                        @else
                                                            <span class="badge badge-secondary">
                                                                Draft
                                                            </span>
                                                        @endif

                                                    </td>

                                                    <td>

                                                        <a
                                                            href="{{ route('admin.rooms.edit', $room) }}"
                                                            class="btn btn-primary"
                                                            title="Edit"
                                                        >
                                                            <i class="feather icon-edit-2"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('admin.rooms.destroy', $room) }}"
                                                            method="POST"
                                                            style="display:inline"
                                                            onsubmit="return confirm('Delete this room?')"
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

                                            @endforeach

                                        @else

                                            <tr>

                                                <td colspan="8" class="text-center">
                                                    No rooms yet.
                                                </td>

                                            </tr>

                                        @endif

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
