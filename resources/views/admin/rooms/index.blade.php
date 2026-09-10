@extends('layouts.admin')

@section('title', 'Rooms')

@section('content')

  <div class="top-bar">
    <h1>Rooms</h1>
    <a href="{{ route('admin.rooms.create') }}" class="btn">Add room</a>
  </div>

  <table>
    <thead>
      <tr><th>Name</th><th>Price / night</th><th>Sleeps</th><th>Published</th><th></th></tr>
    </thead>
    <tbody>
      @forelse ($rooms as $room)
        <tr>
          <td>{{ $room->name }}</td>
          <td>A${{ number_format($room->price_per_night, 0) }}</td>
          <td>{{ $room->sleeps }}</td>
          <td>{{ $room->is_published ? 'Yes' : 'No' }}</td>
          <td>
            <a href="{{ route('admin.rooms.edit', $room) }}">Edit</a>
            &nbsp;
            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this room?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5">No rooms yet.</td></tr>
      @endforelse
    </tbody>
  </table>

@endsection
