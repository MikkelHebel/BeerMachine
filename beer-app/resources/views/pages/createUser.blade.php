<x-app>
    @vite(['resources/css/admin.css'])

    <x-notification></x-notification>
    <x-navigation-bar />

    <div class="admin-container">

        <h1 class="admin-title">Create New User</h1>

        <form action="{{ route('user.store') }}" method="POST" class="admin-form">
            @csrf

            <div class="admin-form-group">
                <label class="admin-label">Name</label>
                <input type="text" name="name" class="admin-input" required>
            </div>

            <div class="admin-form-group">
                <label class="admin-label">Email</label>
                <input type="email" name="email" class="admin-input" required>
            </div>

            <div class="admin-form-group">
                <label class="admin-label">Password</label>
                <input type="password" name="password" class="admin-input" required>
            </div>

            <div class="admin-form-group checkbox-group">
                <label class="admin-label">Is this user an Admin?</label>
                <input type="checkbox" name="is_admin" value="1" class="admin-checkbox">
            </div>

            <button type="submit" class="admin-btn btn-new" style="margin-top: 1rem;">
                Create User
            </button>

        </form>
    </div>
</x-app>
