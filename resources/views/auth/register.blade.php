@extends('layouts.main')

@section('content')
<h1>User Register</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('auth.do-register') }}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="">Password Validation</label>
        <input type="password" name="password_confirmation">
    </div>
    <div>
        <select name="role" id="">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="super">Super Admin</option>
        </select>
    <div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>
@endsection
