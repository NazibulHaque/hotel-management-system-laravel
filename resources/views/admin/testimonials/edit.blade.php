@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
  <h1>Edit testimonial</h1>
  @include('admin.testimonials._form', ['testimonial' => $testimonial, 'action' => route('admin.testimonials.update', $testimonial), 'method' => 'PUT'])
@endsection
