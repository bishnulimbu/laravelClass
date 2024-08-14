@extends('backend.main')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Category</h3>
                            </div>

                            @if ($errors->any())
                                @foreach($errors->all() as $error)
                                    <!-- <div class="ml-3"><p style="color: red;">{{$error}}</p></div> -->
                                @endforeach
                            @endif


                            @if(session()->has('message'))
                                <div id="alert-message" class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif



                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    @csrf
                                    <!-- Title Field -->
                                    <div class="form-group">
                                        <label for="productTitle">Title</label>
                                        <input type="text" class="form-control" name="title" id="productTitle" placeholder="Title" value="{{ old('title') }}">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <!-- Description Field -->
                                    <div class="form-group">
                                        <label for="productDescription">Description</label>
                                        <textarea class="form-control" name="description" id="productDescription" placeholder="Description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <!-- Price Field -->
                                    <div class="form-group">
                                        <label for="productPrice">Price</label>
                                        <input type="number" step="0.01" class="form-control" name="price" id="productPrice" placeholder="Price" value="{{ old('price') }}">
                                        @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <!-- Image Upload Field -->
                                    <div class="form-group">
                                        <label for="productImage">Image</label>
                                        <input type="file" class="form-control" name="image" id="productImage">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="brandCategory">Brand</label>
                                        <select class="form-control" name="barnd_id">
                                            <option diabled>Select your Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                                        @endforeach
                                        </select>
                                        <!-- <input type="number" class="form-control" name="brand_id" id="productBrand" placeholder="Brand ID"> -->
                                        @error('brand_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productCategory">Category</label>
                                        <label>Select</label>
                                        <select class="form-control" name="category_id">
                                            <option diabled>Select your category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                        </select>
                                        <!-- <label for="productCategory">Category</label> -->
                                        <!-- <input type="number" class="form-control" name="category_id" id="productCategory" placeholder="Category ID"> -->
                                        @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <!-- Stock Field -->
                                    <div class="form-group">
                                        <label for="productStock">Stock</label>
                                        <input type="number" class="form-control" name="stock" id="productStock" placeholder="Stock" value="{{ old('stock') }}">
                                        @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <!-- Quantity Field -->
                                    <div class="form-group">
                                        <label for="productQuantity">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" id="productQuantity" placeholder="Quantity" value="{{ old('quantity') }}">
                                        @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <!-- Color Field -->
                                    <div class="form-group">
                                        <label for="productColor">Color</label>
                                        <input type="text" class="form-control" name="color" id="productColor" placeholder="Color" value="{{ old('color') }}">
                                        @error('color')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <!-- Size Field -->
                                    <div class="form-group">
                                        <label for="productSize">Size</label>
                                        <input type="text" class="form-control" name="size" id="productSize" placeholder="Size" value="{{ old('size') }}">
                                        @error('size')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alert = document.getElementById('alert-message');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    </script>
@endsection
