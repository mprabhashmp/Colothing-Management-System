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

    {{-- ctagories --}}

    @php
        use App\Models\catagaory;
        $cat = catagaory::all();
    @endphp

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
{{-- 
               @foreach ($maincatss as $m)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/maincatagories/{{$m->main_catagoryname}}" >
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
              --}}

            @foreach ($cat as $m)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{$m->main_catagoryname}}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">All Clothingggg</a></li>
                  @foreach ($cat as $c)
                  <li><a class="dropdown-item" href="#">{{$c->catagoryname}}</a></li>
                  @endforeach
                </ul>
              </li>
              @endforeach 

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
                    <input class="form-control me-2" type="search" placeholder="Searchhhh" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
            </div>

         
                
        </div>
      </nav>




          {{-----------------------------------------NAVBAR END------------------------------------------------------------- --}}