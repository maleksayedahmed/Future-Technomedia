<x-guest-layout>
    <div class="mb-4 text-muted">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">
                Email Password Reset Link
            </button>
        </div>
    </form>
</x-guest-layout>
