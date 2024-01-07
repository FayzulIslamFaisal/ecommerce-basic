<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .order_pagination span {
            color: #000 !important;
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
                <div class="container">
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <form method="get" action="{{ route('search') }}">
                                @csrf
                                <div class="form-group d-flex">
                                  <input type="search" class="form-control text-white " name="search" placeholder="Search Somthing" >
                                  <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="order_title py-5">
                                All Oders
                            </div>
                            <div class="order_table bg-white text-black mb-5">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="text-black" scope="col">Id</th>
                                        <th class="text-black" scope="col">name</th>
                                        <th class="text-black" scope="col">email</th>
                                        <th class="text-black" scope="col">phone</th>
                                        <th class="text-black" scope="col">address</th>
                                        <th class="text-black" scope="col">Title</th>
                                        <th class="text-black" scope="col">price</th>
                                        <th class="text-black" scope="col">quantity</th>
                                        <th class="text-black" scope="col">image</th>
                                        <th class="text-black" scope="col">payment Status</th>
                                        <th class="text-black" scope="col">delivery Status</th>
                                        <th class="text-black" scope="col">Action </th>
                                        <th class="text-black" scope="col">Print PDF </th>
                                        <th class="text-black" scope="col">Send Email </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order )
                                        <tr>
                                            <th class="text-black" scope="row">
                                                {{ $order->id }}
                                            </th>
                                            <td class="text-black">
                                                {{ $order->name }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->email }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->phone }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->address }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->product_title }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->price }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->quantity }}
                                            </td>
                                            <td class="text-black">
                                                <img src="{{asset($order->image)}}" alt="">
                                            </td>
                                            <td class="text-black">
                                                {{ $order->payment_status }}
                                            </td>
                                            <td class="text-black">
                                                {{ $order->delivery_status }}
                                            </td>
                                            <td class="text-black">
                                                @if ($order->delivery_status=== 'processing')
                                                    <a class="btn btn-danger" href="{{ route('delivered',$order->id) }}">Delivered ?</a>
                                                    @else
                                                    <p class="bg-success p-2 text-white text-center">Delivered</p>
                                                @endif
                                            </td>
                                            <td class="text-black">
                                               <a class="btn btn-info" href="{{route('print_pdf',$order->id) }}">PDF Print</a>
                                            </td>
                                            <td class="text-black">
                                                Send Email
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                </div>

                            </div>
                            <div class="order_pagination my-3">
                                {!! $orders->links() !!}
                            </div>
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
