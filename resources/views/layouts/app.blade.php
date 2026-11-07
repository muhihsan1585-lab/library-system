<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <h1>Library System</h1>
        @auth
        <nav>
            @can('manage-users')
            <a href="{{ route('users.index') }}">Pengelolaan Pengguna</a>
            @endcan
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('members.index') }}">Members</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
        @endauth
        <hr>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <hr>
        <p>Library System</p>
    </footer>
</body>

</html>