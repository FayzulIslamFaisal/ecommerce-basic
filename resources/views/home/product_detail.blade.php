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
      <style>
        .img-box img {
            width: 100%;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
            @include('home.slider')
         <!-- end slider section -->
      </div>

      <div class="container">
        <div class="row  my-5">
        <div class="col-md-12">
            <div class="box">
               <div class="img-box">
                  <img class="img-fluid" src="{{ asset( $products->image ) }}" alt="">
               </div>
               <div class="py-5">
                    <h5>
                        {{ $products->title }}
                    </h5>
               </div>
               <div class="detail-box">
                    @if ($products->discount_price!=null)
                        <h6>
                            Discount:<br>
                             {{ $products->discount_price }}
                        </h6>
                        <h6 style="text-decoration: line-through">
                            price:<br>
                             {{ $products->price }}
                        </h6>
                        @else
                        <h6>
                            Price: {{ $products->price }}
                        </h6>
                    @endif
               </div>
               <p>Details: {{ $products->description }}</p>
               <strong>Category: {{ $products->category }}</strong><br>
               <strong>Quantity: {{ $products->quantity }}</strong>
               <div class="py-4">
                <form class="py-3" method="POST" action="{{ route('add_cart',$products->id) }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <input class="form-control" value="1" type="number" min="1" name="quantity">
                        </div>
                        <div class="col-6">
                            <button class="btn btn-success" type="submit">Add to Cart</button>
                        </div>
                    </div>
                 </form>
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
