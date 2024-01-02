@extends('admin.layouts.app')

@section('title')
    Users
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white d-flex
                                justify-content-between align-items-center">
                                <h3 class="mt-2">
                                    Users ({{ $users->count() }})
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Pictures</th>
                                            <th>Registred</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    {{ $user->pictures->count() }}
                                                </td>
                                                <td>
                                                    {{ $user->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a onclick="deleteItem({{$user->id}})" href="#" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="{{$user->id}}" action="{{route('admin.users.destroy', $user)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection