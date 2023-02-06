<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clara Clothing - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
 
  </head>
  <body>

    {{-- --------------------------------------Scroll Back to top Button---------------------------------------------------------- --}}

    <button type="button" class="btn btn-danger btn-floating btn-lg rounded-circle" id="btn-back-to-top">
      <i class="fas fa-arrow-up"></i>
    </button>


    {{-----------------------------------------NAVBAR Start------------------------------------------------------------- --}}

    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"><b>Clara Clothing</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>

               @foreach ($maincatss as $m)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/maincatagories/{{$m->main_catagoryname}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{$m->main_catagoryname}}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">All Clothing</a></li>
                  @foreach ($cat as $c)
                  <li><a class="dropdown-item" href="#">{{$c->catagoryname}}</a></li>
                  @endforeach
                </ul>
              </li>
              @endforeach 
             


{{-- 
              @foreach ($maincatss as $m)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{$m->main_catagoryname}}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">All Clothing</a></li>
                  @foreach ($cat as $c)
                  <li><a class="dropdown-item" href="#">{{$c->catagoryname}}</a></li>
                  @endforeach
                </ul>
              </li>
              @endforeach  --}}



              @auth

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/customer/cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge rounded-pill badge-notification bg-danger mb-">3</span>
        </a>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a
                class="btn btn-secondary-outline dropdown-toggle hidden-arrow"
                href="#"
                type="button" data-bs-toggle="dropdown" aria-expanded="false"
                >
                <img
                    src="{{auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('/images/user/duser.png')}}"
                    class="rounded-circle"
                    height="30"
                    width="auto"
                    alt="Black and White Portrait of a Man"
                    loading="lazy"
                />
                </a>
                    <ul
                    class="dropdown-menu dropdown-menu-start"
                    >
                        <li>
                            <a class="dropdown-item" href="/user/profile">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                        </li>
                        <li>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                          </form>
                        </li>
                    </ul>
            </li>

            @else
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/login">Login</a>
            </li>
            @endauth

            </ul>
 
                  <form role="search" class="d-flex" action="{{url()->current()}}">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
            </div>

         
                
        </div>
      </nav>

        {{-- ----------------------------------------------Scroll to top button -------------------------------------------------------- --}}


          {{-----------------------------------------NAVBAR END------------------------------------------------------------- --}}


          <main>
            {{-- -------------------------------------------Main Content Goes Here------------------------------------ --}}


        
        @yield('content')




            {{-- -------------------------------------------Main Content Goes Here up------------------------------------ --}}
          </main>





           {{---------------------------------------------------Footer-------------------------------------------------- --}}

           <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Clara Clothing
            </h6>
            <p>
              Mon-Fri : 9.00 AM to 5.30 PM <br>
              Saturday : 9.00 AM to 2.30 PM <br>
              Sunday : Closed
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="/shopping/allmen" class="text-reset">Mens Wear</a>
            </p>
            <p>
              <a href="/shopping/allwomen" class="text-reset">Womens Wear</a>
            </p>
            <p>
              <a href="/shopping/allkids" class="text-reset">Kids wear</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Home & Living</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Contact</a>
            </p>
            @auth
            <p>
              <a href="/dashboard" class="text-reset">Dashboard</a>
            </p>
            <p>
              <a href="/dashboard/#orderdashbord" class="text-reset">Orders</a>
            </p>
            <p>
            @endauth
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Port City, Colombo</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 94 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 94 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © {{ date('Y') }} Copyright:
      <a class="text-reset fw-bold" href="/">claraclothing.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


          




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

  </body>
</html>