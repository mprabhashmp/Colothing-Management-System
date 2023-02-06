<x-layout>
    <section id="productDetails" class="pb-5">

        <!--News card-->
        <div class="card mt-5 hoverable">
            <div class="row mt-5">
                <div class="col-lg-6">
                    {{-- <div class="row mx-2"> --}}
                        <div id="carouselExampleIndicators"  class="carousel slide megagallery"  data-bs-ride="true">
                            <div class="carousel-inner px-2">
                              <div class="carousel-item active">
                                <img src="{{$product->image1 ? asset('uploads/'.$product->image1) : asset('/images/logos/clara.png')}}" class="d-block w-100"  alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{$product->image2 ? asset('uploads/'.$product->image2) : asset('/images/logos/clara.png')}}" class="d-block w-100"  alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{$product->image3 ? asset('uploads/'.$product->image3) : asset('/images/logos/clara.png')}}" class="d-block w-100"  alt="...">
                              </div>
                            </div>
                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button> --}}
                            <div class="px-2 my-1 thumbnailgallery">
                                <div class="wrap"><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"><img src="{{$product->image1 ? asset('uploads/'.$product->image1) : asset('/images/logos/clara.png')}}" class="d-block w-100" alt="..."></button></div>
                                <div class="wrap"><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"><img src="{{$product->image2 ? asset('uploads/'.$product->image2) : asset('/images/logos/clara.png')}}" class="d-block w-100" alt="..."></button></div>
                                <div class="wrap"><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"><img src="{{$product->image3 ? asset('uploads/'.$product->image3) : asset('/images/logos/clara.png')}}" class="d-block w-100" alt="..."></button></div>


                              </div>
                          </div>
                    {{-- </div> --}}

                </div>



                <div class="col-lg-6 mr-3 text-center text-md-left">
                    <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                        <strong>{{$product->name}} </strong>
                    </h2>

                    </strong>
                    </h2>

                    <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                        <span class="red-text font-weight-bold">
                            <strong>Rs.{{$product->price}}</strong>
                        </span>

                    </h3>

                    <p class="ml-xl-0 ml-4">{{$product->des}}</p>
                    {{-- <p class="ml-xl-0 ml-4">
                        <strong>Color Available: </strong>Black, Blue, White</p> --}}
                    <div class="ml-xl-0 ml-4 mt-4 d-inline-flex">
                        <strong>Size:</strong><x-size-tags :tagsCsv="$product->size" /></div>

                    <div class="ml-xl-0 ml-4 mt-4 ">
                        <strong>Size:</strong><x-size-radio :sizetagsCsv="$product->size" /></div>
                        
                    <p class="ml-xl-0 ml-4">
                        <strong>Availability: </strong>{{$product->status}}</p>




                    <!-- Add to Cart -->
                    <section class="color">
                        <div class="mt-5">
                            <div class="col-sm-12">

                            @auth

                                <form action="{{route('cart.store')}}" method="post">
                                    @csrf
                                    <div class="row mt-3 mb-4">

                                        <div class="col-md-12 text-center text-md-left text-md-right">
                                            <input type="hidden" value="{{$product->id}}" name="pid">
                                            <input type="hidden" value="{{Auth::user()->id}}" name="cid">
                                            <input type="number" min="1" value="1" name="qun" id="qun" style="max-width: 60px">
                                            <button class="btn btn-primary btn-rounded" type="submit">
                                            <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button>

                                        </div>

                                    </div>

                                </form>

                            @else
                                <a href="{{route('login')}}" class="btn btn-info">Login to Buy</a>
                            @endauth

                            </div>
                        </div>
                    </section>
                    <!-- /.Add to Cart -->
                </div>
            </div>
        </div>
        <!--News card-->

    </section>



              {{------------------------------------------------Similar Product Section--------------------------------------------------------------------}}
<div class="container my-5">
    <div class="eleven">
      <h1>Similar Products</h1>
    </div>

  </div>


  <div class="swiperwrap">
    <div class="sliderbox">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              @foreach ($all as $a)

              <div class="swiper-slide">
                    <div class="product-box position-relative">
                        <img src="{{ asset('uploads/'.$a->image1) }}" alt="" srcset="">
                        <div class="card-btn">
                          <a class="btn btn-white rounded-pill" href="{{route('cproduct.show',$a->id)}}">View</a>
                        </div>
                    </div>

                    <div class="product-info">
                        <div class="product-name">
                            <h6>{{$a->name}}</h6>
                        </div>
                        <div class="product-price">
                            <h5>Rs {{$a->price}}</h5>
                        </div>
                    </div>


              </div>
              @endforeach

            </div>
            <div class="swiper-pagination"></div>
          </div>
    </div>
  </div>





</x-layout>
