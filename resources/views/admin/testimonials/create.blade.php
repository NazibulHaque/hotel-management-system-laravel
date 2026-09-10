@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')
  <h1>Add testimonial</h1>
  @include('admin.testimonials._form', ['testimonial' => null, 'action' => route('admin.testimonials.store'), 'method' => 'POST'])
@endsection
