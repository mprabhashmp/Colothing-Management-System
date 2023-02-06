<x-layout>
    <x-header href="#product">
        {{ Breadcrumbs::render('shop') }}
    </x-header>
    
    
        <div class="container" id="product">
    
          <!--Grid row-->
          <div class="row mt-5">
    
            <!--Grid column-->
            <div class="col-md-4 mb-4">
    
              <!-- Section: Sidebar -->
              <section>
    
                <!-- Section: Categories -->
                <section>
    
                  <h5>Categories</h5>
    
                  <div class="text-muted small text-uppercase mb-5">
                    {{-- <p class="mb-4">return to <a href="#!" class="card-link-secondary"><strong>Clothing, Shoes,
                          Accessories</strong></a></p> --}}
    
                    @foreach ($cat as $c)
                        <p class="mb-3"><a href="?cat={{$c->catagoryname}}" class="text-secondary text-decoration-none">{{$c->catagoryname}}</a></p>
                    @endforeach
    
                  </div>
    
                </section>
                <!-- Section: Categories -->
    
                <!-- Section: Filters -->
                <section>
    
                  <h5 class="pt-2 mb-4">Filters</h5>
    
                  <section class="mb-4">
    
                    <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                        <form action="/customer/" class="d-flex">
                            <input type="text" id="search12" class="form-control mb-0" placeholder="Search..." name="psearch">
                            <button type="submit" class="btn btn-flat btn-md px-3 waves-effect"><i class="fas fa-search fa-lg"></i></button>
                        </form>
                    </div>
    
                  </section>
    
                  <!-- Section: Condition -->
                  {{-- <section class="mb-4">
    
                    <h6 class="font-weight-bold mb-3">Brand</h6>
    
                    <div class="brandsm">
                        <div class="blogo"><img src="{{asset('/images/brands/1.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/2.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/3.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/4.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/5.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/6.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/7.png')}}" alt="" srcset=""></div>
                        <div class="blogo"><img src="{{asset('/images/brands/8.png')}}" alt="" srcset=""></div>
                      </div>
    
                  </section> --}}
                  <!-- Section: Condition -->
    
    
                   <!-- Section: Price -->
                  <section class="mb-4">
    
                    <h6 class="font-weight-bold mb-3">Price</h6>
    
    
                    
                    <form action="/customer/">
                      <div class="d-flex align-items-center mt-4 pb-1 ">
                        <div class="md-form md-outline my-0">
                          <input id="from" type="text" class="form-control mb-0" name="pmin" style="max-width: 90px">
                          <label for="form">Rs. Min</label>
                        </div>
                        <p class="px-2 mb-0 text-muted mb-4"> - </p>
                        <div class="md-form md-outline my-0">
                          <input id="to" type="text" class="form-control mb-0" name="pmax" style="max-width: 90px">
                          <label for="to">Rs. Max</label>
                        </div>
                        <div class="md-form md-outline my-0 pb-4 ">
                        <button type="submit" class="btn btn-flat btn-md px-3 waves-effect"><i class="fas fa-search fa-lg"></i></button>
                        </div>
                      </div>
                    </form>
    
                  </section>
                  <!-- Section: Price -->
    
    
                  <!-- Section: Size -->
                  <section class="mb-4">
    
                    <h6 class="font-weight-bold mb-3">Size</h6>
     
    
                    <div class="form-check pl-0 mb-3">
                        <form action="/customer/">
                        <input type="checkbox" class="form-check-input filled-in" id="s" name="sizes" value="S">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="s">S</label>
                      </div>
                      <div class="form-check pl-0 mb-3">
                        <input type="checkbox" class="form-check-input filled-in" id="m" name="sizes" value="M">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="m">M</label>
                      </div>
                      <div class="form-check pl-0 mb-3">
                        <input type="checkbox" class="form-check-input filled-in" id="l" name="sizes" value="L">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="l">L</label>
                      </div>
                      <div class="form-check pl-0 mb-3">
                        <input type="checkbox" class="form-check-input filled-in" id="xl" name="sizes" value="XL">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="xl">XL</label>
                      </div>
                      <div class="form-check pl-0 mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-secondary ">Apply</button>
                      </div>
                    </form>
      
    
                  </section>
                  <!-- Section: Size --> 
    
                </section>
                <!-- Section: Filters -->
    
              </section>
              <!-- Section: Sidebar -->
    
            </div>
            <!--Grid column-->
    
    
    
    
    
    
    
    
    
    
    
    
    
            <!--Grid column-->
            <div class="col-md-8 mb-4">
    
              <!-- Section: Block Content -->
    
              <!-- Section: Block Content -->
    
              <!--Section: Block Content-->
              <section>
    
                <!-- Grid row -->
                <div class="row">
    
                  <!-- Grid column -->
    
                    <!-- Card -->
                    @foreach($subcatagory as $product)
                    <x-card :product="$product" />
                    @endforeach
                    <!-- Card -->
    
    
    
    
    
    
    
              <!-- Section: Block Content -->
              <section>
                {{$products->links('pagination::bootstrap-5')}}
                </div>
    
              </section>
              <!-- Section: Block Content -->
    
            </div>
            <!--Grid column-->
    
          </div>
          <!--Grid row-->
    
        </div>
    
    
    
    </x-layout>
    