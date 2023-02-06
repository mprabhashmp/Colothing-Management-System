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
            <form action="{{route('stocke.update',$stock->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                  <label for="name" class="form-label">Suppler:</label>
                  <select class="form-select" name="supid">

                    @foreach ($supp as $su)
                        @if ($stock->supid == $su->id)
                            <option value="{{$stock->supid}}">{{$su->fullname}} | {{$su->companyname}}</option>
                        @endif
                    <option value="{{$su->id}}">{{$su->fullname}} | {{$su->companyname}}</option>
                    @endforeach
                  </select>
                </div>

                  <div class="mb-3 mt-3">
                    <label for="image" class="form-label">Quntity</label>
                    <input type="number" value="{{$stock->quntity}}" class="form-control" placeholder="Quntity"  id="qun" name="qun">
                  </div>



                  <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Stock Price:</label>
                    <input type="text" value="{{$stock->price}}" class="form-control" id="price" placeholder="Enter Stock Price" name="price">
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="code" class="form-label">Date:</label>
                    <input type="date" value="{{$stock->date}}" class="form-control" id="date" placeholder="Enter Date" name="date">
                  </div>

                  <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Product Description:</label>
                    <textarea class="form-control" rows="5" id="des" name="des">{{$stock->des}}</textarea>
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>


@endsection
