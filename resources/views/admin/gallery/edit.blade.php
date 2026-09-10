@extends('layouts.admin')

@section('title', 'Edit Image')

@section('content')
  <h1>Edit gallery image</h1>
  @include('admin.gallery._form', ['image' => $image, 'action' => route('admin.gallery.update', $image), 'method' => 'PUT'])
@endsection
