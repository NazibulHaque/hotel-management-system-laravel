@extends('layouts.admin')

@section('title', 'Add Room')

@section('content')
  <h1>Add room</h1>
  @include('admin.rooms._form', ['room' => null, 'action' => route('admin.rooms.store'), 'method' => 'POST'])
@endsection
