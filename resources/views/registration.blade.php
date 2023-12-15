@extends('layout.login')
@section('title','Registration')
@section('content')
<div class="container">
    <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width:500px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('login')}}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

