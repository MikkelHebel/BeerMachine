<x-app>
    <x-notification></x-notification>
    <x-navigation-bar />

    <h1>Create New User</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name" class="input-label">Name</label>
        <input type="text" name="name" required>

        <label for="email" class="input-label">Email</label>
        <input type="text" name="email" required>

        <label for="email" class="input-label">Password</label>
        <input type="password" name="password" required>

        <label for="is_admin" class="input-label">Is this user an Admin?</label>
        <input type="checkbox" name="is_admin" />
        <button type="submit">New User</button>
    </form>
</x-app>
