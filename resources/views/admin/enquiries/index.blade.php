@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')

<div class="content-wrapper">


<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">Enquiries</h3>
    </div>

    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ __('Enquiries') }}
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="content-body">

    <section id="enquiries-list">

        <div class="row">
            <div class="col-12">

                @include('partials.session_message')

                <div class="card rounded">

                    <div class="card-header">
                        <h4 class="card-title">All Enquiries</h4>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Room') }}</th>
                                            <th>{{ __('Dates') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($enquiries as $e)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $e->name }}</td>

                                                <td>
                                                    <a href="mailto:{{ $e->email }}">
                                                        {{ $e->email }}
                                                    </a>
                                                </td>

                                                <td>
                                                    {{ $e->room->name ?? '—' }}
                                                </td>

                                                <td>
                                                    {{ $e->checkin->format('d M Y') }}
                                                    –
                                                    {{ $e->checkout->format('d M Y') }}
                                                </td>

                                                <td>
                                                    <span class="badge badge-{{ $e->status }}">
                                                        {{ ucfirst($e->status) }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.enquiries.show', $e) }}"
                                                       class="btn btn-primary btn-sm"
                                                       title="View">
                                                        <i class="feather icon-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    {{ __('No enquiries yet.') }}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>

                            </div>

                            <div class="mt-2">
                                {{ $enquiries->links() }}
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
