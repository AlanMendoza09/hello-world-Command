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
            <th>View profile</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                @if ( auth()->user()->role == 'admin' || auth()->user()->role == 'super' )
                <td><a href="{{route('users.edit', $item->id ) }}"> View</a></td>
                @endif
                @if ( auth()->user()->role == 'super' )
                <td>
                    <form action="{{ route('users.destroy', ['user' => $item]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
