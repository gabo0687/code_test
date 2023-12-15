@extends('layout.login')
@section('title','Login')
@section('content')
<div class="container">
    <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width:500px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{route('registration')}}" class="btn btn-secondary">Sign up</a>
    </form>
</div>
@endsection

