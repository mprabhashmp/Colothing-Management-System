<header>
    <div class="p-5 text-center bg-image rounded-0 d-flex align-content-center justify-content-center" style="background-image: url('{{asset('/images/headers/header.jpg')}}'); height: 500px;">
        <div class="mask d-flex justify-content-center" style="background-color: rgba(0, 0, 0, 0.4); min-width:90%">
            <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                @auth
                <h1 class="mb-3">Hi, {{ucfirst(auth()->user()->name)}} </h1>
                <h2 class="mb-3">Welcome to Clara Clothing</h2>
                @else
                <h1 class="mb-3">Welcome to Clara Clothing</h1>
                @endauth
                <h4 class="mb-3 d-flex justify-content-center">
                    {{$slot}}
                </h4>
                <a {{$attributes->merge(['href'=> ''])}}class="btn btn-outline-light btn-lg shadow-none py-3" style="min-width: 150px;" role="button"><i class="fa-regular fa-circle-down fa-2x"></i></a>
            </div>
            </div>
        </div>
        </div>
</header>