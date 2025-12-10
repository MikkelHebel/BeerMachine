<x-app>
    @vite(['resources/css/admin.css'])

    <x-notification></x-notification>
    <x-navigation-bar />

    <div class="admin-container">
        <h1 class="admin-title">Admin's page</h1>

        <form action="{{ route('user.create') }}" method="GET">
            <button type="submit" class="admin-btn btn-new">New User</button>
        </form>

        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Admin?</th>
                <th>Actions</th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    <td>
                        <div class="admin-actions">
                            <form action="{{ route('user.edit', $user->id) }}" method="GET">
                                <button type="submit" class="admin-btn btn-edit">Edit</button>
                            </form>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="admin-btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app>
