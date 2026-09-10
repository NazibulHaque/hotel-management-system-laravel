@extends('layouts.admin')

@section('title', 'Enquiry')

@section('content')

  <h1>Enquiry from {{ $enquiry->name }}</h1>

  <table style="margin-bottom: 1.5rem;">
    <tr><th>Name</th><td>{{ $enquiry->name }}</td></tr>
    <tr><th>Email</th><td><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></td></tr>
    <tr><th>Phone</th><td>{{ $enquiry->phone ?: '—' }}</td></tr>
    <tr><th>Guests</th><td>{{ $enquiry->guests }}</td></tr>
    <tr><th>Dates</th><td>{{ $enquiry->checkin->format('d M Y') }} – {{ $enquiry->checkout->format('d M Y') }}</td></tr>
    <tr><th>Preferred room</th><td>{{ $enquiry->room->name ?? 'Not specified' }}</td></tr>
    <tr><th>Message</th><td>{{ $enquiry->message ?: '—' }}</td></tr>
    <tr><th>Received</th><td>{{ $enquiry->created_at->format('d M Y, g:ia') }}</td></tr>
  </table>

  <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}" style="margin-bottom: 1rem;">
    @csrf @method('PATCH')
    <div class="field" style="max-width: 240px;">
      <label for="status">Status</label>
      <select id="status" name="status" onchange="this.form.submit()">
        @foreach (['new', 'read', 'archived'] as $status)
          <option value="{{ $status }}" @selected($enquiry->status === $status)>{{ ucfirst($status) }}</option>
        @endforeach
      </select>
    </div>
  </form>

  <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Delete this enquiry?')">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete enquiry</button>
  </form>

  <p style="margin-top: 1.5rem;"><a href="{{ route('admin.enquiries.index') }}">&larr; Back to all enquiries</a></p>

@endsection
