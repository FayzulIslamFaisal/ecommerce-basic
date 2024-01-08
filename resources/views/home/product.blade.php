<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>

       </div>
       <div class="row">
        <div class="col-md-8 offset-2">
            <form method="GET" action=" {{ route('search_product')}}">
                @csrf
                <div class="form-group d-flex align-items-center ">
                    <input type="search" name="searchpro" class="form-control mb-0"  placeholder="Search Product">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
       </div>
       <div class="row">

            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                   <div class="option_container">
                      <div class="options">
                         <a href="{{ route('product_details',$product->id) }}" class="option1">
                         Details Product
                         </a>
                         <form class="py-3" method="POST" action="{{ route('add_cart',$product->id) }}">
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
                   <div class="img-box">
                      <img src="{{ asset( $product->image ) }}" alt="">
                   </div>
                   <div class="">
                        <h5>
                            {{ $product->title }}
                        </h5>
                   </div>
                   <div class="detail-box">
                        @if ($product->discount_price!=null)
                            <h6>
                                Discount:<br>
                                 {{ $product->discount_price }}
                            </h6>
                            <h6 style="text-decoration: line-through">
                                price:<br>
                                 {{ $product->price }}
                            </h6>
                            @else
                            <h6>
                                Price: {{ $product->price }}
                            </h6>
                        @endif
                   </div>


                </div>
             </div>
            @endforeach
       </div>
       <div class="product__paginate my-5">
            {{ $products->links() }}
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
