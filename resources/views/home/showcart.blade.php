<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Home||Fashion </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      {{-- <div class="hero_area"> --}}
         <!-- header section strats -->
         @include('home.header')
      {{-- </div> --}}
      <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-danger">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table bg-success text-white">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Poduct Title</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalprice = 0;
                        @endphp
                        @foreach ($cart as $carts)
                        <tr>
                            <th scope="row">{{ $carts->id }}</th>
                            <td>{{ $carts->product_title }}</td>
                            <td>{{ $carts->quantity }}</td>
                            <td>{{ $carts->price }}</td>
                            <td>
                                <img style="height:100px" class="img-fluid" src="{{ asset( $carts->image )}}" alt="">
                            </td>

                            <td>
                                <a href="{{ route('remove_cart', $carts->id) }}" class="btn btn-danger" >Delete Product</a>

                            </td>

                          </tr>
                          @php
                              $totalprice += $carts->price;
                          @endphp
                        @endforeach



                    </tbody>
                  </table>
                  <div class="">
                    <h1>Total Price: {{ $totalprice }}</h1>
                  </div>
                  <div class="order__proceed my-5 text-center">
                    <h3>Proceed to Order</h3>
                    <div class="d-flex align-items-center py-3 justify-content-center ">
                        <a class="btn btn-info mr-3" href="{{ route('cash_order')}}">Cash on Delivery</a>
                        <a class="btn btn-dark" href="{{ route('stripe', $totalprice) }}">Pay Using Cart</a>
                    </div>
                  </div>
            </div>
        </div>
      </div>

      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>
