<x-app>
    @vite('resources/css/login.css')

    <div class="login-container">
        <div class="login-box">
            <h1 class="box-title">Nedenunder</h1>
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}" class="input-field" />

                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" required class="input-field" />

                <button type="submit" class="login-btn">Login</button>

                @if ($errors->any())
                    <p class="auth-error">Sorry, incorrect credentials</p>
                @endif
            </form>
        </div>

    </div>
</x-app>
