@extends('layout.layout')
@section('title','Edit')

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div>
    <div class="card">
        <div class="card-body">
            <p class="h5">Full Name</p>
            <p class="form-control">{{$user->name}}</p>
            <form action="{{route('users.update',$user)}}" method="POST" >
                @csrf
                @method('PUT')
                @foreach ($rols as $role)
                <div class="mb-3">
                    <input type="checkbox" name="roles[]" class="mr-1" value="{{$role->id}}" {{ $role->model_id == $user->id ? 'checked' : '' }}>
                    {{$role->name}}
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection