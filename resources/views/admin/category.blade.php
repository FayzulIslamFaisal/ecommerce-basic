<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .page_title {
            text-align: center;
            margin-bottom: 50px;
        }
        .category__form input {
            color: #fff !important;
        }
        .category_pagination nav span {
            color: #000;
        }
        .category_pagination nav a {
            text-decoration: none
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
                <div class="page_title">
                    <h1>Add New Category </h1>
                </div>

                <div class="col-md-10 offset-1 category__form">
                    @if(Session::has('message'))


                    <div class="mb-5 alert alert-warning alert-dismissible fade show  " role="alert">
                        <p class="text-black m-0">{{ Session::get('message') }}</p>

                      </div>

                    @endif
                    <form method="POST" action="{{ route('add_category')}}">
                        @csrf
                        <div class="form-group d-flex ">
                          <input type="text" class="form-control" name="category" placeholder="Category Name">

                          <button type="submit" class="btn btn-primary  ">Category</button>
                        </div>
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </form>
                </div>
                <div class="row mt-5">
                    <div class=" col-md-12 ">
                        <table class="table table-striped bg-white ">
                            <thead>
                              <tr>
                                <th class="text-black" scope="col">Category</th>
                                <th class="text-black" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($data as $category)
                                <tr>
                                    <td class="text-black">
                                        {{ $category->category_name }}
                                    </td>
                                    <td class="text-black">
                                        <a href=" {{ route('delete_category',$category->id)}}" class="btn btn-danger ">Delete</a>
                                    </td>
                                </tr>
                               @endforeach



                            </tbody>
                          </table>
                          <div class="category_pagination mt-4 mb-5">
                            {{ $data->links() }}
                          </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>
