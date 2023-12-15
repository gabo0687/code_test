@extends('layout.layout')
@section('title','Users')

@section('content')
<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-strip">
                <thead>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('users.edit',$user)}}">Edit</a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection