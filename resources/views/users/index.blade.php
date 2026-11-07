@extends('layouts.app')

@section('title', 'Pengelolaan Pengguna')

@section('content')
<div class="container">
    <h2>Pengelolaan Pengguna</h2>
    <p>Daftar pengguna Library System</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Belum ada pengguna.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection