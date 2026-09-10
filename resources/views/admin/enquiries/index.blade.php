@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')

  <h1>Enquiries</h1>

  <table>
    <thead>
      <tr><th>Name</th><th>Email</th><th>Room</th><th>Dates</th><th>Status</th><th></th></tr>
    </thead>
    <tbody>
      @forelse ($enquiries as $e)
        <tr>
          <td>{{ $e->name }}</td>
          <td>{{ $e->email }}</td>
          <td>{{ $e->room->name ?? '—' }}</td>
          <td>{{ $e->checkin->format('d M Y') }} – {{ $e->checkout->format('d M Y') }}</td>
          <td><span class="badge badge-{{ $e->status }}">{{ ucfirst($e->status) }}</span></td>
          <td><a href="{{ route('admin.enquiries.show', $e) }}">View</a></td>
        </tr>
      @empty
        <tr><td colspan="6">No enquiries yet.</td></tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top: 1rem;">
    {{ $enquiries->links() }}
  </div>

@endsection
