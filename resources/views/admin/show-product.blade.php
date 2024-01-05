<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
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
                <div class="row my-5">
                    <div class="col-md-12">
                        <table class="table bg-white ">
                            <thead>
                              <tr>
                                <th class="text-black" scope="col">Id</th>
                                <th class="text-black" scope="col">Product Title</th>
                                <th class="text-black" scope="col">Description</th>
                                <th class="text-black" scope="col">Product Category</th>
                                <th class="text-black" scope="col">Product  Quantity</th>
                                <th class="text-black" scope="col">Product Price</th>
                                <th class="text-black" scope="col"> Discount Price</th>
                                <th class="text-black" scope="col">Product Image</th>
                                <th class="text-black" scope="col">Action</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="text-black">
                                        {{ $product->id }}
                                    </td>
                                    <td class="text-black">
                                        {{ $product->title }}
                                    </td>
                                    <td class="text-black">
                                        {{ Str::limit($product->description, 10) }}
                                    </td>
                                    <td class="text-black">
                                        {{ $product->category }}
                                    </td>
                                    <td class="text-black">
                                        {{ $product->quantity }}
                                    </td>
                                    <td class="text-black">
                                        {{ $product->price }}
                                    </td>
                                    <td class="text-black">
                                        {{ $product->discount_price }}
                                    </td>
                                    <td class="text-black">
                                        <img src="{{$product->image}}" alt="">
                                    </td>
                                    <td class="text-black">
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                  </tr>
                                @endforeach



                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>
