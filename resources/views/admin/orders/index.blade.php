@extends('admin.layouts.app')

@section('title')
    Orders
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
                                    Orders ({{ $orders->count() }})
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Picture</th>
                                            <th>By</th>
                                            <th>Total</th>
                                            <th>Done</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>
                                                    <img src="{{ $order->picture->image_path }}" 
                                                        alt={{ $order->picture->title }}
                                                        class="rounded" width="60" height="60" />
                                                </td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>
                                                    {{ $order->total }}
                                                </td>
                                                <td>
                                                    {{ $order->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a onclick="deleteItem({{$order->id}})" href="#" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="{{$order->id}}" action="{{route('admin.orders.destroy', $order)}}" method="post">
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