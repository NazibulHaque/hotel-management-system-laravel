@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')

  <div class="top-bar">
    <h1>Gallery</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn">Add image</a>
  </div>

  <table>
    <thead>
      <tr><th>Preview</th><th>Category</th><th>Alt text</th><th></th></tr>
    </thead>
    <tbody>
      @forelse ($images as $image)
        <tr>
          <td><img src="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}" alt="" style="width:70px; height:50px; object-fit:cover; border-radius:4px;"></td>
          <td>{{ ucfirst($image->category) }}</td>
          <td>{{ $image->alt_text }}</td>
          <td>
            <a href="{{ route('admin.gallery.edit', $image) }}">Edit</a>
            &nbsp;
            <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this image?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4">No images yet.</td></tr>
      @endforelse
    </tbody>
  </table>

@endsection
