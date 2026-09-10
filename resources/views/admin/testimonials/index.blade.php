@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')

  <div class="top-bar">
    <h1>Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="btn">Add testimonial</a>
  </div>

  <table>
    <thead>
      <tr><th>Guest</th><th>Quote</th><th>Rating</th><th>Published</th><th></th></tr>
    </thead>
    <tbody>
      @forelse ($testimonials as $t)
        <tr>
          <td>{{ $t->guest_name }}</td>
          <td>{{ Str::limit($t->quote, 60) }}</td>
          <td>{{ $t->rating }}/5</td>
          <td>{{ $t->is_published ? 'Yes' : 'No' }}</td>
          <td>
            <a href="{{ route('admin.testimonials.edit', $t) }}">Edit</a>
            &nbsp;
            <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this testimonial?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5">No testimonials yet.</td></tr>
      @endforelse
    </tbody>
  </table>

@endsection
