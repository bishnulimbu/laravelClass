@extends('backend.main')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Use PUT method for updating -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="productTitle">Title</label>
                                        <input type="text" required class="form-control" name="title" value="{{ old('title', $product->title) }}" id="productTitle" placeholder="Title">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productDescription">Description</label>
                                        <input type="text" required class="form-control" name="description" value="{{ old('description', $product->description) }}" id="productDescription" placeholder="Description">
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productPrice">Price</label>
                                        <input type="number" step="0.01" required class="form-control" name="price" value="{{ old('price', $product->price) }}" id="productPrice" placeholder="Price">
                                        @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productImage">Image</label>
                                        <input type="file" class="form-control" name="image" id="productImage">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="mt-2">
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="productBrand">Brand</label>
                                        <select class="form-control" name="brand_id" id="productBrand">
                                            <option value="">Select Brand</option>
                                            @foreach(range(1, 10) as $id) <!-- Replace with actual range or array if needed -->
                                                <option value="{{ $id }}" {{ $product->brand_id == $id ? 'selected' : '' }}>
                Brand {{ $id }} <!-- Replace with actual brand names if available -->
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="productCategory">Category</label>
                                        <select class="form-control" name="category_id" id="productCategory">
                                            <option value="">Select Category</option>
                                            @foreach(range(1, 10) as $id) <!-- Replace with actual range or array if needed -->
                                                <option value="{{ $id }}" {{ $product->category_id == $id ? 'selected' : '' }}>
                Category {{ $id }} <!-- Replace with actual category names if available -->
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productStock">Stock</label>
                                        <input type="number" required class="form-control" name="stock" value="{{ old('stock', $product->stock) }}" id="productStock" placeholder="Stock">
                                        @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productQuantity">Quantity</label>
                                        <input type="number" required class="form-control" name="quantity" value="{{ old('quantity', $product->quantity) }}" id="productQuantity" placeholder="Quantity">
                                        @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productColor">Color</label>
                                        <input type="text" required class="form-control" name="color" value="{{ old('color', $product->color) }}" id="productColor" placeholder="Color">
                                        @error('color')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="productSize">Size</label>
                                        <input type="text" required class="form-control" name="size" value="{{ old('size', $product->size) }}" id="productSize" placeholder="Size">
                                        @error('size')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
