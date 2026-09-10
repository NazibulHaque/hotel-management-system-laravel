<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login — Casa Ulika</title>
  <style>
    body { font-family: system-ui, sans-serif; background: #1f2320; color: #1f2320; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
    .login-card { background: #faf7f2; padding: 2.5rem; border-radius: 10px; width: 100%; max-width: 360px; }
    .login-card h1 { font-size: 1.3rem; margin-top: 0; }
    .field { margin-bottom: 1rem; }
    .field label { display: block; font-weight: 600; margin-bottom: .3rem; font-size: .9rem; }
    .field input { width: 100%; padding: .6rem .7rem; border: 1px solid #e2ddd3; border-radius: 6px; box-sizing: border-box; }
    .btn { width: 100%; padding: .65rem; border: none; border-radius: 6px; background: #b5651d; color: #fff; font-weight: 600; cursor: pointer; }
    .error { color: #b3261e; font-size: .85rem; margin-bottom: 1rem; }
  </style>
</head>
<body>
  <div class="login-card">
    <h1>Casa Ulika — Admin</h1>

    @if ($errors->any())
      <p class="error">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
      @csrf
      <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="btn">Log in</button>
    </form>
  </div>
</body>
</html>
