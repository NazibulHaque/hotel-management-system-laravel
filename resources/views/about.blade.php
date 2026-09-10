@extends('layouts.app')

@section('title', 'About')

@section('content')

  <section class="page-hero">
    <div class="container">
      <span class="key-tag">Our Story</span>
      <h1>From Mill to Hotel</h1>
      <p class="lede">
        Casa Ulika began as a traditional olive mill and has been carefully
        restored into a twelve-room boutique hotel in Sydney, Australia.
        Today, the property combines historic character, Mediterranean
        hospitality, and a relaxed coastal atmosphere.
      </p>
    </div>
  </section>

  <section>
    <div class="container grid-2" style="align-items: center;">
      <div>
        <img src="{{ asset('images/bergen-harbour-hotel.jpg') }}"
          alt="The original olive press stone, preserved in the Casa Ulika courtyard"
          style="border-radius: var(--radius-md); box-shadow: var(--shadow-card);">
      </div>
      <div>
        <h2>A family business, still</h2>
        <p>The mill was established in 1887 as a small family olive-pressing business. Over the decades, the building became a gathering place for the local community, combining traditional craftsmanship with the relaxed character of coastal living.</p>
        <p>In 2017, the family began an extensive restoration project, transforming the historic building into a boutique hotel while preserving its original stonework, timber details, and olive-mill character.</p>
        <p>Casa Ulika opened its doors in 2019 with twelve rooms. Today, the property continues the tradition of olive growing, with guests invited to enjoy the grove, locally inspired food, and peaceful surroundings.</p>
      </div>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-head">
        <span class="key-tag">Timeline</span>
        <h2>139 years of history</h2>
      </div>

      <ol class="timeline">
        <li class="timeline-item">
          <div class="year">1887</div>
          <h3>The mill is established</h3>
          <p>Casa Ulika begins as a traditional olive mill, built with locally sourced stone and designed around the craft of olive pressing.</p>
        </li>
        <li class="timeline-item">
          <div class="year">1962</div>
          <h3>Second press installed</h3>
          <p>A larger stone press is added as the mill grows and begins serving olive growers from the surrounding area.</p>
        </li>
        <li class="timeline-item">
          <div class="year">1994</div>
          <h3>The mill closes</h3>
          <p>Changing market conditions and the rise of large-scale production lead to the closure of the traditional mill. The historic building is later used for storage.</p>
        </li>
        <li class="timeline-item">
          <div class="year">2017</div>
          <h3>Restoration begins</h3>
          <p>The family begins an eighteen-month restoration project, carefully preserving the original stone walls and architectural character of the building.</p>
        </li>
        <li class="timeline-item">
          <div class="year">2019</div>
          <h3>Casa Ulika opens</h3>
          <p>The restored property opens as a twelve-room boutique hotel in Sydney, combining historic mill character with contemporary comfort.</p>
        </li>
      </ol>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="section-head">
        <span class="key-tag">Our Approach</span>
        <h2>What we changed, and what we kept</h2>
      </div>

      <div class="grid-3">
        <article class="feature-card">
          <h3>Kept: the walls</h3>
          <p>The original stonework remains an important part of Casa Ulika. Modern improvements were introduced carefully to preserve the historic appearance and character of the building.</p>
        </article>
        <article class="feature-card">
          <h3>Changed: the interiors</h3>
          <p>The former working spaces were transformed into comfortable guest rooms using natural materials, linen, oak, and brass while retaining the atmosphere of the original building.</p>
        </article>
        <article class="feature-card">
          <h3>Kept: the grove</h3>
          <p>The olive grove remains an important part of the property. Guests are welcome to explore the grounds and experience the peaceful landscape during their stay.</p>
        </article>
      </div>
    </div>
  </section>

@endsection
