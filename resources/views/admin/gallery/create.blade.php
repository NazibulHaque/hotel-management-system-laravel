@extends('layouts.admin')

@section('title', 'Add Image')

@section('content')
  <h1>Add gallery image</h1>
  @include('admin.gallery._form', ['image' => null, 'action' => route('admin.gallery.store'), 'method' => 'POST'])
@endsection
