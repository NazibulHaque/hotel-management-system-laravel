@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

  <div class="top-bar">
    <h1>Dashboard</h1>
  </div>

  <div class="stat-grid">
    <div class="stat-card"><div class="num">{{ $roomCount }}</div>Rooms</div>
    <div class="stat-card"><div class="num">{{ $galleryCount }}</div>Gallery images</div>
    <div class="stat-card"><div class="num">{{ $testimonialCount }}</div>Testimonials</div>
    <div class="stat-card"><div class="num">{{ $newEnquiryCount }}</div>New enquiries</div>
  </div>

  <h2>Recent enquiries</h2>
  <table>
    <thead>
      <tr><th>Name</th><th>Room</th><th>Dates</th><th>Status</th><th></th></tr>
    </thead>
    <tbody>
      @forelse ($recentEnquiries as $e)
        <tr>
          <td>{{ $e->name }}</td>
          <td>{{ $e->room->name ?? '—' }}</td>
          <td>{{ $e->checkin->format('d M') }} – {{ $e->checkout->format('d M') }}</td>
          <td><span class="badge badge-{{ $e->status }}">{{ ucfirst($e->status) }}</span></td>
          <td><a href="{{ route('admin.enquiries.show', $e) }}">View</a></td>
        </tr>
      @empty
        <tr><td colspan="5">No enquiries yet.</td></tr>
      @endforelse
    </tbody>
  </table>

@endsection
