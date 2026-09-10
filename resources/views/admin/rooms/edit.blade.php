@extends('layouts.admin')

@section('title', 'Edit Room')

@section('content')
  <h1>Edit room</h1>
  @include('admin.rooms._form', ['room' => $room, 'action' => route('admin.rooms.update', $room), 'method' => 'PUT'])
@endsection
