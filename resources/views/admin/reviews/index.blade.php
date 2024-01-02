@extends('admin.layouts.app')

@section('title')
    Reviews
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
                                    Reviews ({{ $reviews->count() }})
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Comment</th>
                                            <th>Rating</th>
                                            <th>Approved</th>
                                            <th>By</th>
                                            <th>Picture</th>
                                            <th>Added</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{$review->id}}</td>
                                                <td>{{$review->comment}}</td>
                                                <td>{{$review->rating}}</td>
                                                <td>
                                                    @if ($review->approved)
                                                        <span class="badge bg-success">
                                                            Yes    
                                                        </span> 
                                                    @else 
                                                        <span class="badge bg-danger">
                                                            No    
                                                        </span> 
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $review->user->name }}
                                                </td>
                                                <td>
                                                    <img src="{{ $review->picture->image_path }}" 
                                                        alt={{ $review->title }}
                                                        class="rounded" width="60" height="60" />
                                                </td>
                                                <td>
                                                    {{ $review->created_at }}
                                                </td>
                                                <td>
                                                    @if ($review->approved)
                                                        <a href="{{route('admin.reviews.edit', ['review' => $review, 'status' => 0])}}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-eye-slash"></i>
                                                        </a>
                                                    @else 
                                                        <a href="{{route('admin.reviews.edit', ['review' => $review, 'status' => 1])}}" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check-double"></i>
                                                        </a>
                                                    @endif
                                                    <a onclick="deleteItem({{$review->id}})" href="#" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="{{$review->id}}" action="{{route('admin.reviews.destroy', $review)}}" method="post">
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