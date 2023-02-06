<x-layout>

    @php
        $total = 0;
        $cids = [];
    @endphp
    <section class="h-100 gradient-custom">
        <div class="container py-5">
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Cart</h5>
                </div>
                <div class="card-body">
                  @foreach ($cart as $c)

                  <!-- Single item -->
                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Image -->
                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <img src="{{asset('uploads/'.$c->image1)}}"
                          class="w-100" alt="Blue Jeans Jacket" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                      </div>
                      <!-- Image -->
                    </div>

                    @php
                        $cids[]['cartid'] = $c->id;
                    @endphp
                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                      <!-- Data -->
                      <p><strong>{{$c->name}}</strong></p>
                      <p>Single price - RS. {{$c->price}}</p>
                      <input type="hidden" id="pri" value="{{$c->price}}">
                      <p>Size: {{$c->size}}</p>

                        <form action="{{route('cart.destroy',$c->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                title="Remove item">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                      {{-- <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                        title="Move to the wish list">
                        <i class="fas fa-heart"></i>
                      </button> --}}
                      <!-- Data -->
                    </div>

                    @php
                        $total = $total+($c->price * $c->qun);
                    @endphp

                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <div class="d-flex mb-4" style="max-width: 300px">
                        <!-- <button class="btn btn-primary px-1 me-2" style="max-height: 36px;"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button> -->
                       <form action="{{route('cart.update',$c->id)}}" method="post" id="cartform">
                        @csrf
                        @method('PUT')
                        <div class="form-outline">
                          <input id="qu" min="1" name="qun" value="{{$c->qun}}" type="number" class="form-control" />
                          <label class="form-label" for="form1">Quantity <button type="submit" class="btn btn-info">ADD</button></label>
                        </div>

                    </form>
                        <!-- <button class="btn btn-primary px-1 ms-2" style="max-height: 36px;"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button> -->
                      </div>
                      <!-- Quantity -->

                      <!-- Price -->
                      <p class="text-start text-md-center">
                        <strong>Total Amount is RS. </strong><strong id="tot">{{$c->price * $c->qun}}</strong>
                      </p>
                      <!-- Price -->
                    </div>
                  </div>
                  <!-- Single item -->
                  <hr>
                  @endforeach

                  <hr class="my-4" />


                </div>
              </div>


              <div class="card mb-4">
                <div class="card-body">
                  <p><strong>Expected shipping delivery</strong></p>

                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body">
                  <p><strong>We accept</strong></p>
                  <img class="me-2" width="45px"
                    src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                    alt="Visa" />
                  <img class="me-2" width="45px"
                    src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                    alt="American Express" />
                  <img class="me-2" width="45px"
                    src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                    alt="Mastercard" />
                  <img class="me-2" width="45px"
                    src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom.svg"
                    alt="PayPal acceptance mark" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                      Products
                      <span>Rs.{{$total}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                      Delivery
                      <span>Rs.450</span>
                    </li>
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Total amount</strong>
                        <strong>
                          <p class="mb-0">(including VAT)</p>
                        </strong>
                      </div>
                      <span><strong>Rs.{{$total + 450}}</strong></span>
                    </li>
                  </ul>

                @php
                  $cartid = json_encode($cids);
                @endphp

                    <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cus" value="{{Auth::user()->id}}">
                        <input type="hidden" name="pro" value="{{$cartid}}">
                        <input type="hidden" name="tot" value="{{$total + 450}}">
                        <button type="submit" class="btn btn-primary btn-md btn-block">
                            Go to checkout
                        </button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>

            function calpri() {
                let fro = document.getElementById('cartform');
                fro.submit();
            }


      </script>
</x-layout>
