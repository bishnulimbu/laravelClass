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




              <form action="{{ route('brand.store') }}" method="POST">
                <div class="card-body">
                    @csrf
                  <div class="form-group">
                    <label for="categoryTitle">Title</label>
                    <input type="text" class="form-control" name="title" id="categoryTitle" placeholder="Title">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="categoryDescription">Description</label>
                    <input type="text" class="form-control" name="description" id="categoryDescription" placeholder="Description">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                </div>
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
