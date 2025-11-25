<x-app>
    <x-notification></x-notification>
    <x-navigation-bar />

    <h1>Update User: {{ $user->name }}</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name" class="input-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label for="email" class="input-label">Email</label>
        <input type="text" name="email" value="{{ old('email', $user->email) }}" required>

        <label for="email" class="input-label">Password</label>
        <input type="password" name="password">

        <label for="is_admin" class="input-label">Is this user an Admin?</label>
        <input type="checkbox" name="is_admin" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} />
        <button type="submit">New User</button>
    </form>
</x-app>
