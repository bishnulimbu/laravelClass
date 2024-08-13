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
                        <a href="/category/create" class="btn btn-success ">Add Category</a>
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
                                        <th>S.n</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>

                                        <a href="/category/edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="/category/delete/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a>

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