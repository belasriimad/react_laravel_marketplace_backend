@extends('admin.layouts.app')

@section('title')
    Categories
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
                                    Categories ({{ $categories->count() }})
                                </h3>
                                <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>
                                                    <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a onclick="deleteItem({{$category->id}})" href="#" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="{{$category->id}}" action="{{route('admin.categories.destroy', $category)}}" method="post">
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