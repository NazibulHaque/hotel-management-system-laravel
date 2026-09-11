@extends('layouts.admin')

@section('title', 'Enquiry')

@section('content')

<div class="content-wrapper">


<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-primary">
                {{ __('Enquiry List') }}
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
                    <a href="{{ route('admin.enquiries.index') }}">
                        {{ __('Enquiries') }}
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    {{ __('View Enquiry') }}
                </li>
            </ol>
        </div>
    </div>

</div>

<div class="content-body">

    <section id="enquiry-details">

        <div class="row">

            <div class="col-md-8 col-12">

                @include('partials.session_message')

                <div class="card rounded">

                    <div class="card-header">
                        <h4 class="card-title">
                            Enquiry from {{ $enquiry->name }}
                        </h4>
                    </div>

                    <div class="card-content collapse show">

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered">

                                    <tbody>

                                        <tr>
                                            <th width="30%">Name</th>
                                            <td>{{ $enquiry->name }}</td>
                                        </tr>

                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <a href="mailto:{{ $enquiry->email }}">
                                                    {{ $enquiry->email }}
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $enquiry->phone ?: '—' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Guests</th>
                                            <td>{{ $enquiry->guests }}</td>
                                        </tr>

                                        <tr>
                                            <th>Dates</th>
                                            <td>
                                                {{ $enquiry->checkin->format('d M Y') }}
                                                –
                                                {{ $enquiry->checkout->format('d M Y') }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Preferred Room</th>
                                            <td>
                                                {{ $enquiry->room->name ?? 'Not specified' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Message</th>
                                            <td>
                                                {{ $enquiry->message ?: '—' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Received</th>
                                            <td>
                                                {{ $enquiry->created_at->format('d M Y, g:ia') }}
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 col-12">

                <div class="card rounded">

                    <div class="card-header">
                        <h4 class="card-title">Manage Enquiry</h4>
                    </div>

                    <div class="card-content collapse show">

                        <div class="card-body">

                            <form method="POST"
                                  action="{{ route('admin.enquiries.update', $enquiry) }}">
                                @csrf
                                @method('PATCH')

                                <div class="form-body">

                                    <div class="form-group">
                                        <label for="status">
                                            {{ __('Status') }}
                                        </label>

                                        <select id="status"
                                                name="status"
                                                class="form-control"
                                                onchange="this.form.submit()">

                                            @foreach (['new', 'read', 'archived'] as $status)
                                                <option value="{{ $status }}"
                                                    @selected($enquiry->status === $status)>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>

                            </form>

                            <hr>

                            <form method="POST"
                                  action="{{ route('admin.enquiries.destroy', $enquiry) }}"
                                  onsubmit="return confirm('Delete this enquiry?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="feather icon-trash-2"></i>
                                    Delete Enquiry
                                </button>

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
