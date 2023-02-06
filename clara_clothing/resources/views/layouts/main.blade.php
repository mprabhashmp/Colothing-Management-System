@auth

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

@if (Auth::user()->roll == 1)
    <title>Admin Dashboard</title>
@elseif(Auth::user()->roll == 2)
    <title>Staff Dashboard</title>
@else
    <title>Un athorized access</title>
@endif

  <meta content="" name="description">
  <meta content="" name="keywords">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">Clara Clothing</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <!--a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a-->
                    <i class="bi bi-box-arrow-right"></i>
                    <button type="submit">Sign Out</button>
                </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

@if (Auth::user()->roll == 1)

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Suppliers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('suppliers.index')}}">
            <i class="bi bi-circle"></i><span>All Sppliers</span>
            </a>
        </li>
        <li>
            <a href="{{route('suppliers.create')}}">
            <i class="bi bi-circle"></i><span>Add Suppliers</span>
            </a>
        </li>

        </ul>
    </li><!-- End supplier Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Catagory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('catagory.index')}}">
            <i class="bi bi-circle"></i><span>All Catagory</span>
            </a>
        </li>
        <li>
            <a href="{{route('catagory.create')}}">
            <i class="bi bi-circle"></i><span>Add Catagory</span>
            </a>
        </li>

        <li>
          <a href="{{route('maincatagories.index')}}">
          <i class="bi bi-circle"></i><span>All Main Catagories</span>
          </a>
      </li>
      <li>
          <a href="{{route('maincatagories.create')}}">
          <i class="bi bi-circle"></i><span>Add Main Catagory</span>
          </a>
      </li>

        </ul>
    </li><!-- End supplier Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('ordercon.index')}}">
          <i class="bi bi-circle"></i><span>All Orders</span>
          </a>
      </li>
      </ul>
  </li><!-- End supplier Nav -->


    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav4" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('product.index')}}">
            <i class="bi bi-circle"></i><span>All Products</span>
            </a>
        </li>
        <li>
            <a href="{{route('product.create')}}">
            <i class="bi bi-circle"></i><span>Add product</span>
            </a>
        </li>

        </ul>
    </li><!-- End supplier Nav -->

    <li>
      <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Staff</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('staff.index')}}">
          <i class="bi bi-circle"></i><span>All Staff</span>
          </a>
      </li>
      <li>
          <a href="{{route('staff.create')}}">
          <i class="bi bi-circle"></i><span>Add Staff</span>
          </a>
      </li>

      </ul>
    </li><!-- End supplier Nav -->

    <li><!-- End supplier Nav -->
      <a class="nav-link collapsed" data-bs-target="#components-nav6" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Staff</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav6" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('staff.index')}}">
          <i class="bi bi-circle"></i><span>All Staff</span>
          </a>
      </li>
      <li>
          <a href="{{route('staff.create')}}">
          <i class="bi bi-circle"></i><span>Add Staff</span>
          </a>
      </li>

      </ul>
    </li><!-- End supplier Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav7" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Stockes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav7" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('stocke.index')}}">
            <i class="bi bi-circle"></i><span>All Stockes</span>
            </a>
        </li>
        <li>
            <a href="{{route('stocke.create')}}">
            <i class="bi bi-circle"></i><span>Add Stockes</span>
            </a>
        </li>

        </ul>
    </li><!-- End supplier Nav -->



@elseif(Auth::user()->roll == 2)

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Suppliers</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{route('suppliers.index')}}">
        <i class="bi bi-circle"></i><span>All Sppliers</span>
        </a>
    </li>
    <li>
        <a href="{{route('suppliers.create')}}">
        <i class="bi bi-circle"></i><span>Add Suppliers</span>
        </a>
    </li>

    </ul>
</li><!-- End supplier Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Catagory</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{route('catagory.index')}}">
        <i class="bi bi-circle"></i><span>All Catagory</span>
        </a>
    </li>
    <li>
        <a href="{{route('catagory.create')}}">
        <i class="bi bi-circle"></i><span>Add Catagory</span>
        </a>
    </li>


    </ul>
</li><!-- End supplier Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{route('product.index')}}">
        <i class="bi bi-circle"></i><span>All Products</span>
        </a>
    </li>
    <li>
        <a href="{{route('product.create')}}">
        <i class="bi bi-circle"></i><span>Add product</span>
        </a>
    </li>

    </ul>
</li><!-- End supplier Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{route('product.index')}}">
        <i class="bi bi-circle"></i><span>All Products</span>
        </a>
    </li>
    <li>
        <a href="{{route('product.create')}}">
        <i class="bi bi-circle"></i><span>Add product</span>
        </a>
    </li>

    </ul>
</li><!-- End supplier Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Stockes</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{route('stocke.index')}}">
        <i class="bi bi-circle"></i><span>All Stockes</span>
        </a>
    </li>
    <li>
        <a href="{{route('stocke.create')}}">
        <i class="bi bi-circle"></i><span>Add Stockes</span>
        </a>
    </li>

    </ul>
</li><!-- End supplier Nav -->



@else

    <a href="{{route('login')}}" class="btn btn-info">Get Access to your Dashbord</a>

@endif



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
        @if (Auth::user()->id == 1 || Auth::user()->id == 2)
            <div class="container">

                @yield('content')

            </div>
        @endif


    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


   <!-- Vendor JS Files -->
   <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>

@else

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Access Denided</title>
    </head>
    <body>
        <div class="box">
            <h1><b>You have no Access for this area or your login sesson was expired.... </b><br> Goto login page and login again</h1>
            <br>
            <a href="{{route('login')}}" class="btn">Go TO Login page</a>
        </div>



        <style>
            .box{
                position: absolute;
                top: 50%;
                left: 50%;
                text-align: center;
                transform: translate(-50%,-50%);
                padding: 20px;
                margin: 20px;
                color: white;
                background-color: #353935;
            }
        </style>
    </body>
    </html>

@endauth
