@extends('backend.main') @section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="/product/create" class="btn btn-success ">Add Product</a>
                            </div>
                            @if(session()->has('message'))
                                <div id="alert-message" class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <table
                                    id="example2"
                                    class="table table-bordered table-hover"
                                    >
                                    <thead>
                                        <tr>
                                            <th>S.N</th> <!-- Serial Number -->
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Brand ID</th>
                                            <th>Category ID</th>
                                            <th>Stock</th>
                                            <th>Quantity</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->price}}</td>
                                                <td><img src="{{ asset('storage/' . $item->image) }}" alt="Image" width="50">
                                                    <p>{{ asset('storage/' . $item->image) }}</p>
                                                </td>
                                                <td>{{$item->brand_id}}</td>
                                                <td>{{$item->category_id}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->color}}</td>
                                                <td>{{$item->size}}</td>
                                                <td>
                                                    <a href="/product/edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="/product/delete/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
