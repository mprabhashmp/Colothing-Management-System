@props(['product'])
<div class="col-md-4 mb-5">
    <div class="product-box position-relative">
        <img src="{{$product->image1 ? asset('/uploads/'. $product->image1) : asset('/images/logos/clara.png')}}" alt="" srcset="">

        <div class="card-btn">
          <a class="btn btn-white rounded-pill" href="{{route('cproduct.show',$product->id)}}">View</a>
        </div>
    </div>

    <div class="product-info pb-2">
        <div class="product-name">
            <h6>{{$product->name}}</h6>
            
        </div>
        <div class="product-price d-flex justify-content-between">
            <h5>{{$product->price}}</h5>
            <span><x-size-tags :tagsCsv="$product->size" /></span>
        </div>
    </div>
</div>
