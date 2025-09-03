<x-guest-layout>
    <div class="mb-4 text-muted">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">
                Confirm
            </button>
        </div>
    </form>
</x-guest-layout>
