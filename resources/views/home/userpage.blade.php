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
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
     @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
    @include('home.product')
      <!-- end product section -->
      {{-- Comment and repty system --}}
      <div class="container">
        <div class="row pb-5">
            <div class="col-md-8 offset-2">
                <div class="comment_title text-center pb-5">
                    <h3>Comment </h3>
                </div>
                <div class="comment_form">
                    <form action="{{ route('add_comment') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Some Comment Here" name="comment" rows="3"></textarea>
                          </div>
                          <input type="submit"  class="btn btn-primary" value="Comment">

                    </form>
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-8 offset-2">
                <div class="comment_title text-center pb-5">
                    <h3>All Comment </h3>
                </div>
                <div class="comment_reply">
                    @foreach ($comments as $comment)
                    <div class="comment_reply_box pb-4">
                        <b> {{ $comment->name }}</b>
                        <p>{{ $comment->comment }}</p>
                        <a href="javascript:void(0)" onclick="reply(this)" data-commentid="{{ $comment->id }}" class="btn btn-success"> Comment Reply</a>


                    </div>
                    @endforeach

                    @foreach ($reply as $reply )
                        @if ($reply->comment_id== $comment->id)
                            <div class="">
                                <b> {{ $reply->name }}</b>
                                <p>{{ $reply->reply }}</p>
                                <a href="javascript:void(0)" onclick="reply(this)" data-commentid="{{ $comment->id }}" class="btn btn-dark"> Comment Reply</a>
                            </div>
                        @endif
                    @endforeach




                </div>
                <div class="comment_reply_details replyDiv" style="display: none" >
                    <div class="comment_reply_details_item">
                        <form action="{{ route('add_reply') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="commentId" name="commentId" hidden>
                                <textarea class="form-control" placeholder="Some Comment Here" name="reply" rows="3"></textarea>
                              </div>
                              <button type="submit"  class="text-black btn btn-info"> Reply</button>
                              <a href="javascript:void(0)" onclick="reply_cancle(this)" class="text-danger btn btn-warning"> Close</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

      </div>


      {{-- Comment and repty system --}}


      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
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

      <script>
        function reply(caller) {
            $comid = document.getElementById('commentId').value=$(caller).attr('data-commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }
        function reply_cancle(caller){
            $('.replyDiv').hide();
        }
      </script>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
   </body>
</html>
