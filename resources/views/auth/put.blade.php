@extends('layouts.main')

@section('content')
<h1>Profile </h1>
<p>User_id: {{ $user->id }}</p>
<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Image profile: </p>

<?php if ($user->image) { ?>
  <img src="{{asset('./storage/images/'.Auth::user()->image )}}" style="width: 80px;height: 80px; padding: 10px; margin: 0px; "/>
<?php }else{ ?>
  <p>Error loading image</p>
<?php } ?>

<p>Change your profile image here: <p>
<form action="{{route('users.index')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit" value="Upload">
</form>
<a href="{{ route('users.index') }}">Back to users</a>
@endsection
