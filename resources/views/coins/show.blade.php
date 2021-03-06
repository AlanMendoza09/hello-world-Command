@extends('layouts.main')

@section('content')
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Short name</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $coin->id }}</td>
            <td>{{ $coin->short_name }}</td>
            <td>{{ $coin->name }}</td>
        </tr>
    </tbody>
</table>
@endsection
