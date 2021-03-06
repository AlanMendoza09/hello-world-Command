@extends('layouts.main')

@section('content')
<h1>List of users</h1>
<p>
    @auth
        {{ auth()->user()->name }}
        {{ auth()->user()->role }}
    @endauth
    <a href="{{ route('auth.logout') }}">Logout</a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td>
                    <form action="{{ route('users.destroy', ['user' => $item]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
