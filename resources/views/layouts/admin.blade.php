<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard') — Casa Ulika Admin</title>
  <style>
    :root { --ink: #1f2320; --paper: #faf7f2; --ochre: #b5651d; --line: #e2ddd3; }
    * { box-sizing: border-box; }
    body { margin: 0; font-family: system-ui, -apple-system, "Segoe UI", sans-serif; background: var(--paper); color: var(--ink); }
    .admin-shell { display: flex; min-height: 100vh; }
    .admin-sidebar { width: 220px; background: var(--ink); color: #fff; padding: 1.5rem 1rem; flex-shrink: 0; }
    .admin-sidebar a { display: block; color: #fff; opacity: .8; text-decoration: none; padding: .6rem .75rem; border-radius: 6px; margin-bottom: .25rem; }
    .admin-sidebar a:hover, .admin-sidebar a.active { opacity: 1; background: rgba(255,255,255,.12); }
    .admin-sidebar .brand { font-weight: 700; font-size: 1.1rem; margin-bottom: 1.5rem; display: block; }
    .admin-main { flex: 1; padding: 2rem; max-width: 1000px; }
    table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; }
    th, td { text-align: left; padding: .65rem .85rem; border-bottom: 1px solid var(--line); font-size: .92rem; }
    th { background: #f1ede5; }
    .btn { display: inline-block; padding: .5rem 1rem; border-radius: 6px; background: var(--ochre); color: #fff; text-decoration: none; border: none; cursor: pointer; font-size: .9rem; }
    .btn-secondary { background: #6b7280; }
    .btn-danger { background: #b3261e; }
    .btn-sm { padding: .3rem .65rem; font-size: .82rem; }
    .field { margin-bottom: 1rem; }
    .field label { display: block; font-weight: 600; margin-bottom: .3rem; font-size: .9rem; }
    .field input, .field textarea, .field select { width: 100%; padding: .55rem .7rem; border: 1px solid var(--line); border-radius: 6px; font-size: .95rem; }
    .field .error { color: #b3261e; font-size: .82rem; margin-top: .25rem; }
    .alert { padding: .75rem 1rem; border-radius: 6px; margin-bottom: 1.25rem; font-size: .9rem; }
    .alert-success { background: #e6f4ea; color: #1e4620; }
    .badge { display: inline-block; padding: .15rem .55rem; border-radius: 999px; font-size: .78rem; font-weight: 600; }
    .badge-new { background: #fde68a; color: #7c4a03; }
    .badge-read { background: #dbeafe; color: #1e3a8a; }
    .badge-archived { background: #e5e7eb; color: #374151; }
    .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 2rem; }
    .stat-card { background: #fff; border-radius: 8px; padding: 1.1rem; border: 1px solid var(--line); }
    .stat-card .num { font-size: 1.6rem; font-weight: 700; }
    .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
  </style>
</head>
<body>
  <div class="admin-shell">
    <aside class="admin-sidebar">
      <span class="brand">Casa Ulika <br>Admin</span>
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
      <a href="{{ route('admin.rooms.index') }}" class="{{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}">Rooms</a>
      <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">Gallery</a>
      <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">Testimonials</a>
      <a href="{{ route('admin.enquiries.index') }}" class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">Enquiries</a>
      <a href="{{ route('home') }}" target="_blank">View site &rarr;</a>
      <form method="POST" action="{{ route('admin.logout') }}" style="margin-top: 1.5rem;">
        @csrf
        <button type="submit" class="btn btn-secondary btn-sm" style="width: 100%;">Log out</button>
      </form>
    </aside>

    <main class="admin-main">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @yield('content')
    </main>
  </div>
</body>
</html>
