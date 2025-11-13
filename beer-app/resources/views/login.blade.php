<x-app>
    <h1>Login</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}"

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Log in</button>
    </form>
</x-app>
