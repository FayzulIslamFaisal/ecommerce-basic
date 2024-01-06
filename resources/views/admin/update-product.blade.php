<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .page_title {
            text-align: center;
            margin-bottom: 50px;
        }
        .form-control {
            color: #fff !important;
        }
        .form-control option {
            color: #fff;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page_title mb-5">
                    <h1>Add New Product </h1>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('update_product_confirm',$product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="title">Product Title</label>
                              <input value="{{$product->title}}" type="text" class="form-control" name="title" placeholder="Enter Product Title">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                              <label for="description">Product Description</label>
                              <input value="{{ $product->description }}" type="text" class="form-control" name="description" placeholder="Enter Product Description">
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Product Category</label>
                                <select class="custom-select form-control" id="category" name="category" >
                                    <option selected value="{{ $product->category}}">
                                        {{ $product->category}}
                                     </option>

                                    @foreach ($categorys as $category)
                                        <option value=" {{ $category->category_name}}">
                                            {{ $category->category_name}}
                                        </option>
                                    @endforeach

                                </select>
                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Product Quantity</label>
                                <input value="{{$product->quantity}}" type="number" class="form-control" name="quantity" min="0" placeholder="Enter Product Quantity">
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input value="{{$product->price}}" type="number" class="form-control" name="price" placeholder="Enter Product Price">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="discount_price">Product Discount Price</label>
                                <input value="{{$product->discount_price}}" type="text" class="form-control" name="dis_price" placeholder="Enter Product Discount Price">
                            @error('dis_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <div class="my-4">
                                    <img class="img-fluid"
                                    src="{{asset($product->image)  }}" alt="">
                                </div>
                                <label for="image">Product Image</label>
                                <input value="{{$product->image}}" type="file" class="form-control" name="image" placeholder="Enter Product Image">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                          </form>
                    </div>
                </div>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>
