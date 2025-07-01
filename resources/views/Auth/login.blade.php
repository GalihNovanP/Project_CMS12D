<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Warteg Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets/css/kaiadmin.min.css') }}" rel="stylesheet" />
  <style>
    body {
      background-color: #f1f2f7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 30px;
      width: 100%;
      max-width: 400px;
    }
    .logo {
      width: 80px;
      height: auto;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="login-card text-center">
    {{-- Logo --}}
    <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" class="logo" alt="Logo Warteg">

    {{-- Judul --}}
    <h4 class="mb-4">Login Admin Warteg</h4>

    {{-- Error --}}
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Form --}}
    <form action="{{ route('login.post') }}" method="POST">
      @csrf
      <div class="form-group mb-3 text-start">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
      </div>

      <div class="form-group mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
