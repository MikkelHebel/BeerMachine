<x-app>
    <x-notification></x-notification>
    <x-navigation-bar />

    <h1>Admin's page</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
            </tr>
        @endforeach
    </table>

</x-app>
