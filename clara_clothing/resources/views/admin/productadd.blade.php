@extends('layouts.main')

@section('content')

    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-sm-12">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 mt-3">
                  <label for="name" class="form-label">Product Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
                </div>

                <div class="mb-3 mt-3">
                    <label for="catagoey" class="form-label">Catagory Name:</label>
                    <select class="form-select" name="catagory" id="catagoey">
                        <option value="">-- Select Catagory --</option>
                        @foreach ($catagory as $c)
                            <option value="{{$c->catagoryname}}">{{$c->catagoryname}}</option>
                        @endforeach

                      </select>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="mcatagoey" class="form-label">Main Catagory Name:</label>
                    <select class="form-select" name="main_catagory" id="catagoey">
                      <option value="selected disabled hidden">-- Select Main Catagory --</option>
                        @foreach ($maincats as $m)
                            <option value="{{$m->name}}">{{$m->name}}</option>
                        @endforeach

                      </select>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="image" class="form-label">Select first image:</label>
                    <input type="file" class="form-control" id="image1" name="images[]" multiple accept="image/*">
                  </div>



                  <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Product Price:</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Product Price" name="price">
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Product Size: <span class="text-muted">(Give as S, M, L, XL)</span></label>
                    <input type="text" class="form-control" id="size" placeholder="Enter Product Size" name="size">
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="code" class="form-label">Product Code:</label>
                    <input type="text" class="form-control" id="code" placeholder="Enter Product Code" name="code">
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Product Description:</label>
                    <textarea class="form-control" rows="5" id="des" name="des"></textarea>
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="status" class="form-label">Product Status:</label>
                    <select class="form-select" name="status">
                        <option value="">-- Select Status --</option>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                      </select>
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>


@endsection
