@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-wrapper {
        padding: 10px 0;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .top-bar h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 600;
        color: #222;
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: #fff;
        border-radius: 10px;
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        border: 1px solid #eee;
        color: #666;
        font-size: 15px;
    }

    .stat-card .num {
        font-size: 30px;
        font-weight: 700;
        color: #222;
        margin-bottom: 8px;
    }

    .dashboard-section {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        border: 1px solid #eee;
    }

    .dashboard-section h2 {
        margin: 0 0 20px;
        font-size: 20px;
        font-weight: 600;
        color: #222;
    }

    .enquiry-table {
        width: 100%;
        border-collapse: collapse;
    }

    .enquiry-table th,
    .enquiry-table td {
        padding: 14px 12px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    .enquiry-table th {
        font-size: 13px;
        font-weight: 600;
        color: #777;
        text-transform: uppercase;
    }

    .enquiry-table td {
        font-size: 14px;
        color: #444;
    }

    .enquiry-table tr:last-child td {
        border-bottom: none;
    }

    .enquiry-table a {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .enquiry-table a:hover {
        text-decoration: underline;
    }

    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-pending {
        background: #fff3cd;
        color: #856404;
    }

    .badge-confirmed {
        background: #d4edda;
        color: #155724;
    }

    .badge-cancelled {
        background: #f8d7da;
        color: #721c24;
    }

    .badge-completed {
        background: #d1ecf1;
        color: #0c5460;
    }

    .empty-message {
        text-align: center !important;
        padding: 30px !important;
        color: #888 !important;
    }

    .alert {
        margin-bottom: 20px;
    }

    @media (max-width: 992px) {
        .stat-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .stat-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-section {
            padding: 15px;
            overflow-x: auto;
        }

        .enquiry-table {
            min-width: 650px;
        }

        .top-bar h1 {
            font-size: 24px;
        }
    }
</style>

<div class="dashboard-wrapper">


{{-- Alerts --}}
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

{{-- Dashboard Header --}}
{{-- <div class="top-bar">
    <h1>Dashboard</h1>
</div> --}}

{{-- Statistics --}}
<div class="stat-grid">

    <div class="stat-card">
        <div class="num">{{ $roomCount }}</div>
        Rooms
    </div>

    <div class="stat-card">
        <div class="num">{{ $galleryCount }}</div>
        Gallery images
    </div>

    <div class="stat-card">
        <div class="num">{{ $testimonialCount }}</div>
        Testimonials
    </div>

    <div class="stat-card">
        <div class="num">{{ $newEnquiryCount }}</div>
        New enquiries
    </div>

</div>

{{-- Recent Enquiries --}}
<div class="dashboard-section">

    <h2>Recent enquiries</h2>

    <table class="enquiry-table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Room</th>
                <th>Dates</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @forelse ($recentEnquiries as $e)

                <tr>
                    <td>{{ $e->name }}</td>

                    <td>
                        {{ $e->room->name ?? '—' }}
                    </td>

                    <td>
                        {{ $e->checkin->format('d M') }}
                        –
                        {{ $e->checkout->format('d M') }}
                    </td>

                    <td>
                        <span class="badge badge-{{ $e->status }}">
                            {{ ucfirst($e->status) }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('admin.enquiries.show', $e) }}">
                            View
                        </a>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5" class="empty-message">
                        No enquiries yet.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>


</div>

@endsection
