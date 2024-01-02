@extends('admin.layouts.app')

@section('title')
    Pictures
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
                                    Pictures ({{ $pictures->count() }})
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Preview</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Added</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pictures as $picture)
                                            <tr>
                                                <td>{{$picture->id}}</td>
                                                <td>{{$picture->title}}</td>
                                                <td>
                                                    <img src="{{ $picture->image_path }}" 
                                                        alt={{ $picture->title }}
                                                        class="rounded" width="60" height="60" />
                                                </td>
                                                <td>
                                                    @if ($picture->status)
                                                        <span class="badge bg-success">
                                                            Live    
                                                        </span> 
                                                    @else 
                                                        <span class="badge bg-danger">
                                                            Blocked    
                                                        </span> 
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $picture->category->name }}
                                                </td>
                                                <td>
                                                    {{ $picture->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    @if ($picture->status)
                                                        <a href="{{route('admin.pictures.edit', ['picture' => $picture, 'status' => 0])}}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-eye-slash"></i>
                                                        </a>
                                                    @else 
                                                        <a href="{{route('admin.pictures.edit', ['picture' => $picture, 'status' => 1])}}" class="btn btn-sm btn-success">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @endif
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