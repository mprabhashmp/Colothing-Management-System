<x-layout>
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn">

          <!-- Heading -->
          <h2 class="my-5 h2 text-center">Checkout form</h2>

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">

              <!--Card-->
              <div class="card">



                <!--Card content-->
                @foreach ($users as $u)

                <div class="address-box">
                    <p><strong>Full Name</strong>       : {{$u->fullname}}</p>
                    <p><strong>Phone number</strong>    : {{$u->telno}}</p>
                    <p><strong>Nic</strong>             : {{$u->nicno}}</p>
                    <p><strong>Address line 1</strong>  : {{$u->addressl1}}</p>
                    <p><strong>Address Line 2</strong>  : {{$u->addressl2}}</p>
                    <p><strong>City</strong>            : {{$u->city}}</p>
                    <p><strong>postal code</strong>     : {{$u->postalcode}}</p>

                </div>
                <br><hr>
                <a href="" class="btn btn-primary">Edit this Data</a>
                @endforeach


                @if ($users == NULL)


                <form class="card-body">

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mb-2">

                      <!--firstName-->
                      <div class="md-form ">
                        <label for="firstName" class="">Full name</label>
                        <input type="text" id="firstName" name="name" class="form-control">
                      </div>

                    </div>
                    <!--Grid column-->

                    {{-- <!--Grid column-->
                    <div class="col-md-6 mb-2">

                      <!--lastName-->
                      <div class="md-form">
                        <label for="lastName" class="">Last name</label>
                        <input type="text" id="lastName" class="form-control">
                      </div>

                    </div>
                    <!--Grid column--> --}}

                  </div>
                  <!--Grid row-->

                  {{-- <!--company-->
                  <div class="md-form mb-5">
                    <label for="address" class="">Company <span class="text-secondary">(Not Required)</span></label>
                    <input type="text" id="address" class="form-control" placeholder="Company">
                  </div> --}}

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-2">

                      <!--firstName-->
                      <div class="md-form ">
                        <label for="firstName" class="">Phone No</label>
                        <input type="text" name="tel" id="tel" class="form-control">
                      </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    {{-- <div class="col-md-6 mb-2">

                      <!--lastName-->
                      <div class="md-form">
                        <label for="lastName" class="">Phone No 2 <span class="text-secondary">(Not Required)</span></label>
                        <input type="text" id="lastName" class="form-control">
                      </div>

                    </div>
                    <!--Grid column--> --}}

                  </div>

                  <!--address-->
                  <div class="md-form mb-5">
                    <label for="address-2" class="">Address line 1</label>
                    <input type="text" id="address-1" name="address1" class="form-control" placeholder="Apartment or suite">
                  </div>

                  <div class="md-form mb-5">
                    <label for="address-2" class="">Address Line 2</label>
                    <input type="text" id="address-2" name="address2" class="form-control" placeholder="Apartment or suite">
                  </div>

                  <div class="md-form mb-5">
                    <label for="address-2" class="">City</label>
                    <input type="text" id="city" name="city" class="form-control" placeholder="Apartment or suite">
                  </div>

                  {{-- <div class="md-form mb-5">
                    <label for="address-2" class="">Street Address</label>
                    <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                  </div> --}}

                  <div class="md-form mb-5">
                    <label for="address-2" class="">Postal Code</label>
                    <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                  </div>

                  {{-- <div class="md-form mb-5">
                    <label for="address-2" class="">Email Address</label>
                    <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                  </div> --}}



                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Add Data</button>

                </form>
                @endif


              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">

              <!-- Heading -->
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
              </h4>

              <!-- Cart -->
              <ul class="list-group mb-3 z-depth-1">
                @foreach ($product as $p)
                    @foreach ($order as $o)
                        @php
                            $cat = json_decode($o->products)
                        @endphp
                        @foreach ($cat as $c)

                            @if ($c->cartid == $p->id)

                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$p->name}}</h6>
                                        {{-- <small class="text-muted">Brief description</small> --}}
                                    </div>

                                </li>

                            @endif
                        @endforeach
                    @endforeach
                @endforeach

                @php
                    $total = 0;
                    $orderid = 0;
                    foreach ($order as $o){
                        $total = $o->total + $total;
                        $orderid = $o->id;
                    }
                @endphp
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total (RS)</span>
                  <strong>RS {{$total}}</strong>
                </li>
              </ul>
              <!-- Cart -->
                <form action="{{route('pay.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="cus" value="{{Auth::user()->id}}">
                    <input type="hidden" name="orderid" value="{{$orderid}}">
                    <input type="hidden" name="payment" value="{{$total}}">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
                </form>
            </div>

            <!--Grid column-->

          </div>
          <!--Grid row-->

        </div>
      </main>
      <!--Main layout-->

</x-layout>
