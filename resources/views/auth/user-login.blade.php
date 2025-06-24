<!DOCTYPE html>
<html>
<head>
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <form method="POST" action="/login" class="p-4 bg-white rounded shadow" style="width: 300px;">
        @csrf
        <h4 class="mb-3 text-center">Login User</h4>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        @error('email') <div class="text-danger mt-2 small">{{ $message }}</div> @enderror
    </form>
</body>
</html>
