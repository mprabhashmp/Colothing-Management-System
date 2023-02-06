<x-layout>



              {{-----------------------------------------Slider Start------------------------------------------------------------- --}}

      <div class="clear-fix"></div>
      <header>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>

            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('/images/slider/1.jpg')}}" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{asset('/images/slider/2.jpg')}}" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{asset('/images/slider/3.jpg')}}" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{asset('/images/slider/4.jpg')}}" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{asset('/images/slider/5.jpg')}}" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{asset('/images/slider/6.jpg')}}" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{asset('/images/slider/7.jpg')}}" class="d-block w-100" alt="...">

              </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
         </div>
      </header>

          {{-----------------------------------------Slider End------------------------------------------------------------- --}}


           {{-----------------------------------------Category Section------------------------------------------------------------- --}}
           <div class="container-fluid mb-5">
            <div class="row my-4 row row-cols-1 row-cols-sm-2 row-cols-md-4">
              <div class="col features d-flex justify-content-center fw-bold"><i class="fa-solid fa-truck-arrow-right fa-2x text-danger mx-3"></i> Island-Wide Delivery</div>
              <div class="col features d-flex justify-content-center fw-bold"><i class="fa-solid fa-money-bill-transfer fa-2x text-danger mx-3"></i> Cash on Delivery</div>
              <div class="col features d-flex justify-content-center fw-bold"><i class="fa-regular fa-credit-card fa-2x text-danger mx-3"></i> Secure Payments</div>
              <div class="col features d-flex justify-content-center fw-bold"><i class="fa-solid fa-shirt fa-2x text-danger mx-3"></i> Unlimited Unique Designs</div>
             </div>
           </div>

           <div class="eleven">
            <h1>Shop By Category</h1>
          </div>

<div class="container my-5 d-flex justify-content-center">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      
      
      <div class="col category-box">
          <div class="card card-image rounded-0" style="
            background:rgba(0, 0, 0, 0.5)url({{asset('images/Categories/men.jpg')}});
            background-size: cover;
            background-position: center center;
            width: 100%;
            height: 100%;
            background-blend-mode: darken;">
            <!-- Content -->
            <div class="inner-line">

            </div>
            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 card-title" style="flex-direction: column;">
                <h3><strong></strong></h3>
                <div><a type="button" class="btn btn-outline-light">View Collection</a></div>
            </div>
          </div>
      </div>

      <div class="col category-box">
        <div class="card card-image rounded-0" style="
          background:rgba(0, 0, 0, 0.5)url({{asset('images/Categories/women.jpg')}});
          background-size: cover;
          background-position: center center;
          width: 100%;
          height: 100%;
          background-blend-mode: darken;">
          <!-- Content -->
          <div class="inner-line">

          </div>
          <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 card-title" style="flex-direction: column;">
              <h3><strong></strong></h3>
              <div><a type="button" class="btn btn-outline-light">View Collection</a></div>
          </div>
        </div>
    </div>

    
    <div class="col category-box">
      <div class="card card-image rounded-0" style="
        background:rgba(0, 0, 0, 0.5)url({{asset('images/Categories/kids.jpg')}});
        background-size: cover;
        background-position: center center;
        width: 100%;
        height: 100%;
        background-blend-mode: darken;">
        <!-- Content -->
        <div class="inner-line">
        </div>
        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 card-title" style="flex-direction: column;">
            <h3><strong></strong></h3>
            <div><a type="button" class="btn btn-outline-light">View Collection</a></div>
        </div>
      </div>
  </div>

  
    

     


  </div>
</div>

<div class="d-flex justify-content-center" style="margin: 80px 0">
  <input type="button" class="btn-grad-black" value="View Collection">
</div>

           {{-- -------------------------------------------Category end--------------------------------------------------------------------- --}}

          {{------------------------------------------------Product Section--------------------------------------------------------------------}}
<div class="container mys-5">
  <div class="eleven">
    <h1>New Arrivals</h1>
  </div>
    <div class="row mt-5">

    </div>
    <div class="row">
        @foreach ($product as $p)

        <div class="col-md-3">
            <div class="product-box position-relative">
                <img src="{{ asset('uploads/'.$p->image1) }}" alt="" srcset="">

                <div class="card-btn">
                  <a class="btn btn-white rounded-pill" href="{{route('cproduct.show',$p->id)}}">View</a>
                </div>
            </div>

            <div class="product-info">
                <div class="product-name">
                    <h6>{{$p->name}}</h6>
                </div>
                <div class="product-price">
                    <h5>RS. {{$p->price}}</h5>
                </div>
            </div>

        </div>
        @endforeach


    </div>
</div>

<div class="d-flex justify-content-center" style="margin: 80px 0">
    <a href="{{route('customer.index')}}" class="btn-grad-black">VIEW COLLECTION</a>
</div>



          {{------------------------------------------------Product Section End--------------------------------------------------------------------}}



          {{-- -------------------------------------------Brands Section start--------------------------------------------------------------------- --}}
        <div class="brandwrapper mt-5">
          <div class="brands">
            <div class="blogo"><img src="{{asset('/images/brands/1.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/2.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/3.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/4.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/5.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/6.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/7.png')}}" alt="" srcset=""></div>
            <div class="blogo"><img src="{{asset('/images/brands/8.png')}}" alt="" srcset=""></div>
          </div>
        </div>




          {{-- -------------------------------------------Brands Section start--------------------------------------------------------------------- --}}



</x-layout>
