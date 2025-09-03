<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-3">
            {{ session('status') }}
        </div>
    @endif



    <form method="POST" action="{{ route('login') }}" class="auth-form" novalidate>
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                <button type="button" class="btn btn-outline-secondary" data-toggle="password" data-target="#password"><i class="bi bi-eye"></i></button>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Remember me</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none" href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
                    <span>Log in</span>
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
