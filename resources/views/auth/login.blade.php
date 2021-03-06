
@extends('layouts.main')

@section('content')
    <h1>User Login</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auth.do-login') }}" method="POST">
        @csrf
        <label for="">Email</label>
        <input type="text" name="email" id="">
        <br>
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <br>
        <input type="submit" value="Inicio de sesión">
    </form>
@endsection
