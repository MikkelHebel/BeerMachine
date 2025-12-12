<x-app>
    @vite(['resources/css/admin.css'])

    <x-notification></x-notification>
    <x-navigation-bar />

    <div class="admin-container">

        <h1 class="admin-title">Update User: {{ $user->name }}</h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="admin-form">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label class="admin-label">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="admin-input" required>
            </div>

            <div class="admin-form-group">
                <label class="admin-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="admin-input" required>
            </div>

            <div class="admin-form-group">
                <label class="admin-label">Password (leave empty to keep current)</label>
                <input type="password" name="password" class="admin-input">
            </div>

            <div class="admin-form-group checkbox-group">
                <label class="admin-label">Is this user an Admin?</label>
                <input type="checkbox" name="is_admin" value="1"
                       class="admin-checkbox"
                       {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
            </div>

            <button type="submit" class="admin-btn btn-edit" style="margin-top: 1rem;">
                Update User
            </button>

        </form>
    </div>
</x-app>
