<x-guest-layout>
    <div class="mb-3 d-flex gap-2">
        <a href="#" class="btn btn-outline-secondary social-btn d-flex align-items-center justify-content-center">
            <i class="bi bi-google me-2"></i> Google
        </a>
        <a href="#" class="btn btn-outline-secondary social-btn d-flex align-items-center justify-content-center">
            <i class="bi bi-github me-2"></i> GitHub
        </a>
    </div>

    <div class="text-center small-muted mb-3">or register with your email</div>

    <form method="POST" action="{{ route('register') }}" class="auth-form" novalidate>
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
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
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" oninput="updateStrengthMeter(this, '#strength1')">
                <button type="button" class="btn btn-outline-secondary" data-toggle="password" data-target="#password"><i class="bi bi-eye"></i></button>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <div id="strength1" class="strength-bar"><i></i></div>
                <div id="strength1-text" class="small-muted ms-2" aria-live="polite">&nbsp;</div>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                <button type="button" class="btn btn-outline-secondary" data-toggle="password" data-target="#password_confirmation"><i class="bi bi-eye"></i></button>
            </div>
            @error('password_confirmation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <a class="text-decoration-none" href="{{ route('login') }}">Already registered?</a>
            <button type="submit" class="btn btn-primary d-flex align-items-center">
                <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
                <span>Register</span>
            </button>
        </div>
    </form>

    <script>
        // Attach real-time strength update for page when password exists on load
        document.addEventListener('DOMContentLoaded', function(){
            var p = document.querySelector('#password');
                if(p){
                p.addEventListener('input', function(){ updateStrengthMeter(p, '#strength1', '#strength1-text'); });
                updateStrengthMeter(p, '#strength1', '#strength1-text');
            }
        });
    </script>
</x-guest-layout>
