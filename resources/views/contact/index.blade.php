@extends('layouts.app')

@section('title', 'Contact')

@section('content')

  <section class="page-hero">
    <div class="container">
      <span class="key-tag">Contact</span>
      <h1>Book Your Stay</h1>
    </div>
  </section>

  <section>
    <div class="container" style="max-width: 640px;">

      @if (session('success'))
        <div class="alert alert-success" role="status" style="margin-bottom: 1.5rem; padding: 1rem; border-radius: 8px; background: #e6f4ea; color: #1e4620;">
          {{ session('success') }}
        </div>
      @endif

      <h2 style="margin-bottom:1.5rem;">Booking Enquiry</h2>

      <form method="POST" action="{{ route('contact.store') }}" novalidate>
        @csrf

        <div class="form-row">
          <div class="field">
            <label for="name">Full name</label>
            <input type="text" id="name" name="name" autocomplete="name" value="{{ old('name') }}" required>
            <p class="error-msg" role="alert">{{ $errors->first('name') }}</p>
          </div>

          <div class="field">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" autocomplete="email" value="{{ old('email') }}" required>
            <p class="error-msg" role="alert">{{ $errors->first('email') }}</p>
          </div>
        </div>

        <div class="form-row">
          <div class="field">
            <label for="phone">Phone <span style="text-transform:none; font-weight:400;">(optional)</span></label>
            <input type="tel" id="phone" name="phone" autocomplete="tel" value="{{ old('phone') }}">
            <p class="error-msg" role="alert">{{ $errors->first('phone') }}</p>
          </div>

          <div class="field">
            <label for="guests">Guests</label>
            <input type="number" id="guests" name="guests" min="1" max="8" value="{{ old('guests', 2) }}" required>
            <p class="error-msg" role="alert">{{ $errors->first('guests') }}</p>
          </div>
        </div>

        <div class="form-row">
          <div class="field">
            <label for="checkin">Check-in</label>
            <input type="date" id="checkin" name="checkin" value="{{ old('checkin') }}" required>
            <p class="error-msg" role="alert">{{ $errors->first('checkin') }}</p>
          </div>

          <div class="field">
            <label for="checkout">Check-out</label>
            <input type="date" id="checkout" name="checkout" value="{{ old('checkout') }}" required>
            <p class="error-msg" role="alert">{{ $errors->first('checkout') }}</p>
          </div>
        </div>

        <div class="field">
          <label for="room">Preferred room</label>
          <select id="room" name="room">
            <option value="">Not sure yet</option>
            @foreach ($rooms as $r)
              <option value="{{ $r->slug }}" @selected(old('room', request('room')) === $r->slug)>{{ $r->name }}</option>
            @endforeach
          </select>
          <p class="error-msg" role="alert">{{ $errors->first('room') }}</p>
        </div>

        <div class="field">
          <label for="message">Message <span style="text-transform:none; font-weight:400;">(optional)</span></label>
          <textarea id="message" name="message" maxlength="600"
            placeholder="Anything else we should know — arrival time, dietary needs, special occasion?">{{ old('message') }}</textarea>
          <p class="hint">Maximum 600 characters.</p>
          <p class="error-msg" role="alert">{{ $errors->first('message') }}</p>
        </div>

        <button type="submit" class="btn btn-primary">Send Enquiry</button>
      </form>
    </div>
  </section>

@endsection
