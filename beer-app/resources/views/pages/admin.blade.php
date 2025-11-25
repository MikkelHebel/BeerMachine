<x-app>
    <x-notification></x-notification>
    <x-navigation-bar />

    <h1>Admin's page</h1>

    <form action="{{ route('user.create') }}" method="GET">
        <button type="submit">New User</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
                <th>
                    <form action="{{ route('user.edit', $user->id) }}" method="GET">
                        <button type="submit">Edit</button>
                    </form>
                </th>
                <th>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm("Are you sure?")>
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </table>

</x-app>
